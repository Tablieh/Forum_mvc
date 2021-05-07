<?php
namespace App\Service;

abstract class Paginator
{
    /**
     * récupère la page courante 
     * 
     * @return int - le numéro de la page courante
     */
    public static function getPage(){
        return intval($_GET['page'] ?? 1);
    }

    /**
     * génère la ligne SQL permettant à une requète de limiter le nombre de résultats en fonction de la page courante
     * 
     * @return string - la ligne SQL sous la forme "LIMIT X OFFSET Y" où X est le nombre d'éléments à afficher et Y le nombre d'éléments à ignorer
     * ex : LIMIT 5 OFFSET 10 garde 5 résultats en omettant les 10 premiers (donc du 11eme au 15eme élément)
     */
    public static function paginate(){
        $offset = (self::getPage()-1) * PER_PAGE;
        return "LIMIT ".PER_PAGE." OFFSET ".$offset;
    }

    /**
     * génère et affiche le HTML de la pagination à destination d'une vue
     * 
     * @param string $baseRoute - l'url à intégrer à chaque lien généré par le paginateur
     * @param int $nbElements - le nombre d'éléments total affichable (sera divisé par le nombre de pages généré)
     * 
     * @return void
     */
    public static function getHTML($baseRoute, $nbElements){
         
        $currentPage = self::getPage();
        $totalPages  = ceil($nbElements/PER_PAGE);
        
        echo "<section id='pagination'><ul>";
                
            if($totalPages > 1 && $currentPage > 1){
                echo "<li class='pagination-arrow'>",
                        "<a href='", $baseRoute, "&page=", 1, "'>",
                            "<i class='fas fa-step-backward'></i>",
                        "</a>",
                        "<a href='", $baseRoute, "&page=", $currentPage-1, "'>",
                                "<i class='fas fa-chevron-left'></i>",
                        "</a>",
                    "</li>";
                       
            }
            
            for($page = 1; $page <= $totalPages; $page++){
                echo "<li ", $currentPage == $page ? "class='active'" : "", ">",
                        "<a href=", $baseRoute, "&page=", $page, ">",
                            $page,
                        "</a>",
                    "</li>";
                        
            }
                
            if($totalPages > 1 && $currentPage < $totalPages){
                echo "<li class='pagination-arrow'>",
                        "<a href='", $baseRoute, "&page=", $currentPage+1, "'>",
                            "<i class='fas fa-chevron-right'></i>",
                        "</a>",
                        "<a href='", $baseRoute, "&page=", $totalPages, "'>",
                            "<i class='fas fa-step-forward'></i>",
                        "</a>",
                    "</li>";
            }

        echo "</ul></section>";
    }
}