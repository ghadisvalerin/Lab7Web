<?php
namespace App\Controllers;
class Page extends BaseController

{
public function about()
{
return view('about', [
'title' => 'Halaman About',
'content' => 'Ini adalah halaman about yang menjelaskan tentang isi
halaman ini.'
]);
}
public function artikel()
{
    return view('artikel');
}
public function tos()
{
echo "ini halaman Term of Services";
}
public function contact()
{
    return view('pages/contact', [
        'title' => 'Hubungi Saya'
    ]);
}
}