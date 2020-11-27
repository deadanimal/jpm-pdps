<?php

namespace App\Http\Controllers;

use Media;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PortalController extends Controller
{
    public function index()
    {
        $banner = DB::table('media')->where([['status', 2],['jenis',2]])->get();
        $berita = DB::table('media')->where([['status', 2],['jenis',1]])->get();

        $berita_data = [];
        $no = 1;
        $no_page = 1;
        foreach($berita as $berita_val){
            $berita_data[$no_page][$no]['tajuk'] = $berita_val->tajuk;
            $berita_data[$no_page][$no]['keterangan'] = $berita_val->keterangan;
            
            if($no % 3 == 0){
                $no_page++;
            }
            $no++;
        }
        // dd($berita_data);
        return view('portal.index',['banner'=>$banner,'berita'=>$berita_data]);
    }

    public function program_list(){
        return view('portal.program-list');
    }
}
