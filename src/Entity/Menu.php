<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $lenuOrder = null;

    #[ORM\Column(nullable: true)]
    private ?int $menuOrder = null;

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'subMenus')]
    private Collection $subMenus;

    #[ORM\Column]
    private ?bool $isVisible = null;

    #[ORM\ManyToOne]
    private ?Actualite $actualite = null;

    #[ORM\ManyToOne]
    private ?Categorie $category = null;

    #[ORM\ManyToOne]
    private ?Post $post = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;

    public function __construct()
    {
        $this->subMenus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLenuOrder(): ?int
    {
        return $this->lenuOrder;
    }

    public function setLenuOrder(?int $lenuOrder): self
    {
        $this->lenuOrder = $lenuOrder;

        return $this;
    }

    public function getMenuOrder(): ?int
    {
        return $this->menuOrder;
    }

    public function setMenuOrder(?int $menuOrder): self
    {
        $this->menuOrder = $menuOrder;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getSubMenus(): Collection
    {
        return $this->subMenus;
    }

    public function addSubMenu(self $subMenu): self
    {
        if (!$this->subMenus->contains($subMenu)) {
            $this->subMenus->add($subMenu);
        }

        return $this;
    }

    public function removeSubMenu(self $subMenu): self
    {
        $this->subMenus->removeElement($subMenu);

        return $this;
    }

    public function isIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function getActualite(): ?Actualite
    {
        return $this->actualite;
    }

    public function setActualite(?Actualite $actualite): self
    {
        $this->actualite = $actualite;

        return $this;
    }

    public function getCategory(): ?Categorie
    {
        return $this->category;
    }

    public function setCategory(?Categorie $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }
}
