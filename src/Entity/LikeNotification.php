<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LikeNotificationRepository")
 */
class LikeNotification extends Notification
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MicroPost")
     */
    private $microPost;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $likedBy;

    /**
     * @return MicroPost
     */
    public function getMicroPost()
    {
        return $this->microPost;
    }

    /**
     * @param MicroPost $microPost
     * @return LikeNotification
     */
    public function setMicroPost($microPost)
    {
        $this->microPost = $microPost;
        return $this;
    }

    /**
     * @return User
     */
    public function getLikedBy()
    {
        return $this->likedBy;
    }

    /**
     * @param User $likedBy
     * @return LikeNotification
     */
    public function setLikedBy($likedBy)
    {
        $this->likedBy = $likedBy;
        return $this;
    }


}
