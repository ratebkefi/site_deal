<?php

namespace Back\DashBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SmsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SmsRepository extends EntityRepository
{
    public function findCommande1()
    {
        $sql = "select cli  ";
        $from = " from Back\CommandeBundle\Entity\Command as cmd ,";
        $from .= "  Back\CommandeBundle\Entity\Client as cli ,";
        $from .= "  Back\CommandeBundle\Entity\Coupon as coup ,";
        $where =" where cmd.client=cli.id and";
        $where .=" coup.command=cmd.id and";
        $where .=" 2=1 and";

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where." GROUP BY cli.id";
        $qb = $this->getEntityManager()->createQuery($query);
        return $qb->getResult();
    }
    public function listeVille($parent)
    {
        foreach ($parent as $item)
        {
            $delegate[] = $item->getId();

        }
        $sql = "select loc  ";
        $from = " from Back\CommandeBundle\Entity\Localite as loc ,";
        $where =" where loc.parent IN ( " . implode(',', $delegate) . " )  and";


        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where." GROUP BY loc.id";
        $qb = $this->getEntityManager()->createQuery($query);
        $quotes_villes =array();
        foreach($qb->getResult() as $item)
        {
            $quotes_villes[] = $item->getId();
        }
        return $quotes_villes;
    }
    public function listeDelegate($parent)
    {
        $sql = "select loc  ";
        $from = " from Back\CommandeBundle\Entity\Localite as loc ,";
        $where =" where loc.parent IN ( " . implode(',', $parent) . " ) and";


        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where." GROUP BY loc.id";
        $qb = $this->getEntityManager()->createQuery($query);

        return $qb->getResult();
    }
    public function findCommande($categorie, $agefrom, $ageto, $sexe, $locality, $status, $deals)
    {
        $sql = "select cli  ";
        $from = " from Back\CommandeBundle\Entity\Command as cmd ,";
        $from .= "  Back\CommandeBundle\Entity\Client as cli ,";
        $from .= "  Back\CommandeBundle\Entity\Coupon as coup ,";
        $where =" where cmd.client=cli.id and";
        $where .=" coup.command=cmd.id and";
        if ($sexe) {
            $where .= "  cli.sex = '" . $sexe . "' and";
        }
        if ($agefrom) {
            $date_start_from = (date('Y') - $agefrom) . date('-01-01');
            $where .= "  cli.datebirth <= '" . $date_start_from . "' and";
        }
        if ($ageto) {
            $date_start_to = (date('Y') - $ageto) . date('-12-31');
            $where .= "  cli.datebirth  > = '" . $date_start_to . "' and";
        }
        if ($status) {

            $staus_array = array();
            foreach ($status as $item) {
                $staus_array[] =  $item ;
            }
            $where .= "  cmd.etat IN ( " . implode(',', $staus_array) . " ) and";
        }
        if($deals){
            $where .=" cmd.deal IN ( " . implode(',', $deals) . " ) and";

        }

        if ($locality) {


             $delegate = self::listeDelegate($locality);
             $ville = self::listeVille($delegate);
            $from .= "  Back\CommandeBundle\Entity\Adress as adr ,";
            $from .= "  Back\CommandeBundle\Entity\Localite as loc ,";
            $where .=" adr.localite = loc.id and";
            $where .=" adr.client = cli.id and";

            $where .= "  loc.id IN ( " . implode(',',$ville) . " ) and";

        }

        if ($categorie) {
             $from .= "  Back\DealBundle\Entity\Deal as deal ,";
             $from .= "  Back\PlanningBundle\Entity\Planning as pla ,";
            $where .=" deal.planning = pla.id and";
            $where .=" cmd.deal = deal.id and";
           $where .= "  pla.categoryId IN ( " . implode(',',$categorie) . " ) and";

        }

        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where." GROUP BY cli.id";
        $qb = $this->getEntityManager()->createQuery($query);
       // echo count($qb->getResult())."<br/>";
       // echo $qb->getSQL(); exit;
        return $qb->getResult();
    }
}
