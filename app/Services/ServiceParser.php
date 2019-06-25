<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Vacancy;
use Goutte\Client;

ini_set("max_execution_time", 0);

const MATCHES_URL = 'https://m.rabota.ua/vacancy/list?cityId=0&keyWords=IT&page=1&parentId=0&scheduleId=0&period=2&noSalary=true&showAgency=true';
const COMPANIES_URL = 'https://m.rabota.ua/vacancy/view/';
const URL_API_COMP = 'https://api.rabota.ua/company/';
const URL_API_VAC = 'https://api.rabota.ua/vacancy?id=';
const SELECTOR_VAC = 'a[class="vacancy-link"][href]';
const SELECTOR_COMP = 'p[class="company-name"]>a';
class ServiceParser
{
    public function index()
    {
        $vacancies = $this->query(MATCHES_URL);
        foreach ($vacancies as $domElement) {
            $matches = 'Найдено вакансий: ';
            $str = $domElement->nodeValue;
            $str_cut = substr($str, strpos($str, $matches));
            preg_match('!\d+!', $str_cut, $vacancies_number);
            $pages_number = $vacancies_number[0] / 60;
        }

        $page = 1;
        do {
            $vacancies = $this->query('https://m.rabota.ua/vacancy/list?cityId=0&keyWords=IT&' . 'page=' . $page . '&parentId=0&scheduleId=0&period=2&noSalary=true&showAgency=true');
            $vacancies->filter(SELECTOR_VAC)->each(function ($node) {
                $hrefs = $node->attr('href');
                $endVacancies = $this->regular($hrefs);
                $company = $this->query(COMPANIES_URL . $endVacancies);
                $company->filter(SELECTOR_COMP)->each(function ($node) {
                    $hrefCompany = $node->attr('href');
                    $endCompany = $this->regular($hrefCompany);
                    $jsonCompany = $this->content(URL_API_COMP . $endCompany);

                    Company::updateOrCreate([
                        'name' => $jsonCompany["name"],
                        'company_id' => $jsonCompany["id"],
                        'site' => $jsonCompany["site"],
                        'description' => $jsonCompany["description"],
                        'logo' => $jsonCompany["logo"],
                        'verified' => $jsonCompany["verified"]]);
                });

                $json = $this->content(URL_API_VAC . $endVacancies);

                Vacancy::updateOrCreate(
                    ['vacancy_id' => $json['id']],
                    [
                        'name' => $json["name"],
                        'companyName' => $json["companyName"],
                        'city' => $json["cityName"],
                        'date' => $json["date"],
                        'salary' => $json["salary"],
                        'branch' => $json["branchName"],
                        'description' => $json["description"],
                        'contactPerson' => $json["contactPerson"],
                        'contactPhone' => $json["contactPhone"],
                        'contactURL' => $json["contactURL"],
                        'dateTxt' => $json["dateTxt"]
                    ]);
            });
            $page++;
        } while ($page <= $pages_number + 1);
    }

    private function regular($href)
    {
        preg_match("/\/(\d+)$/", $href, $matches);
        return $matches[1];
    }

    private function query($url)
    {
        $client = new Client();
        return $client->request('GET', $url);

    }

    private function content($url_api)
    {
        $api = file_get_contents($url_api);
        return json_decode($api, true);
    }
}

?>
