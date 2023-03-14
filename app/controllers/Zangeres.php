<?php

class Zangeres extends BaseController
{
    private $ZangeresModel;

    public function __construct()
    {
        $this->ZangeresModel = $this->model('ZangeresModel');
    }

    public function index()
    {
        $data = [
            'title' => 'top 5 zangeressen van de wereld'
        ];

        $this->view('angeres/index', $data);
    }


    public function getZangeres($id1=NULL, $id2=NULL) 
    {
        $zangeres = $this->ZangeresModel->getZangeres();

        $tableRows = "";
        foreach ($zangeres as $value) {
            $tableRows .= "<tr>
                                <td>$value->Id</td>
                                <td>$value->Naam</td>
                                <td>$value->NettoWaarde</td>
                                <td>$value->Land</td>
                                <td>$value->Mobiel</td>
                                <td>$value->Leeftijd</td>
                           </tr>";
        }

        $data = [
            'title' => 'Overzicht landen van Europa',
            'tableRows' => $tableRows
        ];

        $this->view('zangeres/getZangeres', $data);
    }
}