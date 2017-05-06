<?php

namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use AppBundle\Entity\Post;
use AppBundle\FileUploader;

class FeatureImageUploadListener
{
    private $uploader;
    
    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }
    
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        
        $this->uploadFile($entity);
    }
    
    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();
        
        $this->uploadFile($entity);
    }
    
    private function uploadFile($entity)
    {
        // upload only works for Post entities
        if (!$entity instanceof Post) {
            return;
        }
        
        $file = $entity->getFeatureImage();
        
        // only upload new files
        if (!$file instanceof UploadedFile) {
            return;
        }
        
        $fileName = $this->uploader->upload($file);
        $entity->setFeatureImage($fileName);
    }
}

