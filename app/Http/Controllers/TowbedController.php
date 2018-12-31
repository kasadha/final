<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolioheader;
use App\Towbed;
use App\Nav;
use App\Logo;
use App\Contactheader;
use App\Threebed;
use App\Fourbed;
use App\Fivebed;
use App\Other;
use App\Requestq;

class TowbedController extends Controller
{
    public function index(){
        $portfolioheaders = Portfolioheader::all();
        $towbeds = Towbed::all();
        $navs = Nav::all();
        $logos = Logo::all();
        $contactheaders = Contactheader::all();
        $requestqs = Requestq::all();
      return view('pages.towbed',compact('portfolioheaders','towbeds','navs','logos','contactheaders','requestqs'));
    }
    public function detail($id){
        $towbed = Towbed::find($id);
        $navs = Nav::all();
        $logos = Logo::all();
        $contactheaders = Contactheader::all();
        $requestqs = Requestq::all();
        return view('pages.towdetail',compact('towbed','navs','logos','contactheaders','requestqs'));
    }

    public function threebed(){
        $portfolioheaders = Portfolioheader::all();
        $navs = Nav::all();
        $logos = Logo::all();
        $contactheaders = Contactheader::all();
        $threebeds = Threebed::all();
      return view('pages.threebed',compact('portfolioheaders','towbeds','navs','logos','contactheaders','threebeds'));
    }

    public function threedetail($id){
        $threebed = Threebed::find($id);
        $navs = Nav::all();
        $logos = Logo::all();
        $contactheaders = Contactheader::all();
        return view('pages.threedetail',compact('towbed','navs','logos','contactheaders','threebed'));

    }
    public function fourbed(){
        $portfolioheaders = Portfolioheader::all();
        $navs = Nav::all();
        $logos = Logo::all();
        $contactheaders = Contactheader::all();
        $fourbeds = Fourbed::all();
      return view('pages.fourbed',compact('portfolioheaders','towbeds','navs','logos','contactheaders','fourbeds'));
    }
    public function fourdetail($id){
        $fourbed = Fourbed::find($id);
        $navs = Nav::all();
        $logos = Logo::all();
        $contactheaders = Contactheader::all();
        return view('pages.fourdetail',compact('towbed','navs','logos','contactheaders','fourbed'));

    }
    public function fivebed(){
        $portfolioheaders = Portfolioheader::all();
        $navs = Nav::all();
        $logos = Logo::all();
        $contactheaders = Contactheader::all();
        $fivebeds = Fivebed::all();
      return view('pages.fivebed',compact('portfolioheaders','towbeds','navs','logos','contactheaders','fivebeds'));
    }
    public function fivedetail($id){
        $fivebed = Fivebed::find($id);
        $navs = Nav::all();
        $logos = Logo::all();
        $contactheaders = Contactheader::all();
        return view('pages.fivedetail',compact('navs','logos','contactheaders','fivebed'));
    }
    public function other(){
        $portfolioheaders = Portfolioheader::all();
        $navs = Nav::all();
        $logos = Logo::all();
        $contactheaders = Contactheader::all();
        $others = Other::all();
      return view('pages.other',compact('portfolioheaders','navs','logos','contactheaders','others'));
    }
    public function otherdetail($id){
        $other = Other::find($id);
        $navs = Nav::all();
        $logos = Logo::all();
        $contactheaders = Contactheader::all();
        return view('pages.otherdetail',compact('navs','logos','contactheaders','other'));
    }
}
