<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Imagick;

class ImageController extends Controller
{
    public function index()
    {
        $image  = new Imagick();



        $image->setResolution(300, 300);

        $image->setBackgroundColor('white');

        $image->readImage(public_path('olivera.pdf'));

        $image->setImageFormat('jpg');

        $image->scaleImage(1500, 1500, true);

        $image->mergeImageLayers(Imagick::LAYERMETHOD_FLATTEN);

        $image->setImageAlphaChannel(Imagick::ALPHACHANNEL_REMOVE);
        $image->writeImages('olivera.jpg', true);

        echo "<img src='olivera.jpg'>";


    }
}
