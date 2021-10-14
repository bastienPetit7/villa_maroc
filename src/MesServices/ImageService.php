<?php 

namespace App\MesServices;

use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ImageService
{
    protected $slugger;
    protected $parameterBag;

    public function __construct(SluggerInterface $slugger,ParameterBagInterface $parameterBag)
    {
        $this->slugger = $slugger;
        $this->parameterBag = $parameterBag;
    }

    public function sauvegarderImage(object $object, object $file)
    {
          //Je transforme le nom du fichier
          $originalName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
          $safeName = $this->slugger->slug($originalName);
          $uniqFileName = $safeName . '-' . uniqid() . '.' . $file->guessExtension();

          //Je bouge le fichier dans le dossier uploads
          $file->move(
              $this->parameterBag->get('app_images_directory'),
              $uniqFileName
          );

          $object->setMainPicture('/uploads/' . $uniqFileName);
    }

    public function supprimerImage(string $fileName)
    {
        $pathFile = $this->parameterBag->get('app_images_directory') . '/..' . $fileName;

         
        if(file_exists($pathFile))
        {
            
            unlink($pathFile);
        }
    }
}