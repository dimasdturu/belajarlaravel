<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $judul = "Dashboard";
    protected $menu = "dashboard";
    protected $sub_menu = "";
    protected $direktori = "admin.dashboard";

    public function main(Request $request)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['direktori'] = $this->direktori;

        return view($this->direktori.'.main', $data);
    }

}
