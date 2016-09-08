<?php

namespace Back\CommandeBundle\Entity;
use Symfony\Component\Security\Core\SecurityContext;
use Back\DashBundle\Common\Tools;

use Doctrine\ORM\EntityRepository;

/**
 * CaisseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CaisseRepository extends EntityRepository
{

    public function getChequeMontantCaisse($deal,$user,$dateD,$dateF)
    {
        $sql = "select ope ";
        $from = " from Back\CommandeBundle\Entity\Command as cmd,";
        $from .= "  Back\CommandeBundle\Entity\Operation as ope,";
        $where = " where ope.commande = cmd.id and";
        $where .= "  cmd.dpa BETWEEN  '$dateD 00:00:00' AND '$dateF 23:59:59'  and ";
        $where .= "  ope.modepayement = 2   and ";
        $where .= "  ope.type = 1   and ";
        $where .= "  cmd.etat = 1   and ";

        if ($user) {
            $where .= " cmd.caisse  = " . $user . " and ";
        }
        else
            $where .= " cmd.caisse  is not null and ";
        if ($deal) {
            $where .= " cmd.deal  = " . $deal . " and ";
        }
        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where . " group by cmd.id ";
        $qb = $this->getEntityManager()->createQuery($query);
$montant = 0;
        foreach ($qb->getResult() as $value)
        {
            $montant += $value->getMontant();
        }
        return $montant;
    }
    public function getEspeceMontantCaisse($deal,$user,$dateD,$dateF)
    {
        $sql = "select ope ";
        $from = " from Back\CommandeBundle\Entity\Command as cmd,";
        $from .= "  Back\CommandeBundle\Entity\Operation as ope,";
        $where = " where ope.commande = cmd.id and";
        $where .= "  cmd.dpa BETWEEN  '$dateD 00:00:00' AND '$dateF 23:59:59'  and ";
        $where .= "  ope.modepayement = 1   and ";
        $where .= "  ope.type = 1   and ";
        $where .= "  cmd.etat = 1   and ";

        if ($user) {
            $where .= " cmd.caisse  = " . $user . " and ";
        }
        else
            $where .= " cmd.caisse  is not null and ";
        if ($deal) {
            $where .= " cmd.deal  = " . $deal . " and ";
        }
        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where . " group by cmd.id ";
        $qb = $this->getEntityManager()->createQuery($query);

        $montant = 0;
        foreach ($qb->getResult() as $value)
        {
            $montant += $value->getMontant();
        }
        return $montant;
    }










    public function getChequeVolumeCaisse($deal,$user,$dateD,$dateF)
    {
        $sql = "select ope ";
        $from = " from Back\CommandeBundle\Entity\Command as cmd,";
        $from .= "  Back\CommandeBundle\Entity\Operation as ope,";
        $where = " where ope.commande = cmd.id and";
        $where .= "  cmd.dpa BETWEEN  '$dateD 00:00:00' AND '$dateF 23:59:59'  and ";
        $where .= "  ope.modepayement = 2   and ";
        $where .= "  ope.type = 1   and ";
        $where .= "  cmd.etat = 1   and ";

        if ($user) {
            $where .= " cmd.caisse  = " . $user . " and ";
        }
        else
            $where .= " cmd.caisse  is not null and ";
        if ($deal) {
            $where .= " cmd.deal  = " . $deal . " and ";
        }
        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where . " group by cmd.id ";
        $qb = $this->getEntityManager()->createQuery($query);
        return count($qb->getResult());
    }
    public function getEspeceVolumeCaisse($deal,$user,$dateD,$dateF)
    {
        $sql = "select ope ";
        $from = " from Back\CommandeBundle\Entity\Command as cmd,";
        $from .= "  Back\CommandeBundle\Entity\Operation as ope,";
        $where = " where ope.commande = cmd.id and";
        $where .= "  cmd.dpa BETWEEN  '$dateD 00:00:00' AND '$dateF 23:59:59'  and ";
        $where .= "  ope.modepayement = 1   and ";
        $where .= "  ope.type = 1   and ";
        $where .= "  cmd.etat = 1   and ";

        if ($user) {
            $where .= " cmd.caisse  = " . $user . " and ";
        }
        else
            $where .= " cmd.caisse  is not null and ";
        if ($deal) {
            $where .= " cmd.deal  = " . $deal . " and ";
        }
        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where . " group by cmd.id ";
        $qb = $this->getEntityManager()->createQuery($query);
        return count($qb->getResult());
    }

    public function getListCmdCaisse($data)
    {

        $sql = "select cmd ";
        $from = " from Back\CommandeBundle\Entity\Command as cmd,";
        $where = " where (1=1) and";
        if (isset($data['dpaf'])) {
            $dpaf = Tools::reformatDate($data['dpaf']);
            $where .= " cmd.dcr >='" . $dpaf->format('Y-m-d') . " 00:00:00" . "' and ";
        }
        if (isset($data['dpat'])) {
            $dpat = Tools::reformatDate($data['dpat']);
            $where .= " cmd.dcr <='" . $dpat->format('Y-m-d') . " 23:59:59" . "' and ";
        }
        if (isset($data['dpafp'])) {
            $dpaf = Tools::reformatDate($data['dpafp']);
            $where .= " cmd.dpa >='" . $dpaf->format('Y-m-d') . " 00:00:00" . "' and ";
        }
        if (isset($data['dpatp'])) {
            $dpat = Tools::reformatDate($data['dpatp']);
            $where .= " cmd.dpa <='" . $dpat->format('Y-m-d') . " 23:59:59" . "' and ";
        }
        if (isset($data['etat'])) {
            $where .= " cmd.etat =" . $data['etat'] . " and ";
        }
        if (isset($data['vadd'])) {
            if ($data['vadd'] == 0)
                $where .= " cmd.user is null and ";
            else
                $where .= " cmd.user is not null and ";
        }
       // $where .= " cmd.id >41000 and ";
        if (isset($data['deal'])) {
            $where .= " cmd.deal =" . $data['deal'] . " and ";
        }
        if (isset($data['pnamec']) || isset($data['namec']) || isset($data['emailc']) || isset($data['cincc']) || isset($data['telc'])) {
            $from .= "Back\CommandeBundle\Entity\Client as cli,";
            $where .= " cmd.client=cli.id and ";
            if (isset($data['pnamec'])) {
                $where .= " cli.id  = '" . $data['pnamec'] . "' and ";
            }
            if (isset($data['namec'])) {
                $where .= " cli.fname  like '%" . $data['namec'] . "%' and ";
            }
            if (isset($data['emailc'])) {
                $where .= " cli.email  like '%" . $data['emailc'] . "%' and ";
            }
            if (isset($data['cincc'])) {
                $where .= " cli.cin  like '%" . $data['cincc'] . "%' and ";
            }
            if (isset($data['telc'])) {
                $where .= " cli.id  = '" . $data['telc'] . "' and ";
            }


        }
        if (isset($data['numcoupon'])) {
            $from .= "Back\CommandeBundle\Entity\Coupon as cop,";
            $where .= " cmd.id=cop.command and cop.code='" . $data['numcoupon'] . "' and ";

        }
        if (isset($data['nom_porteur_cheque']) || isset($data['num_cheque']) ) {
            $from .= "Back\CommandeBundle\Entity\Operation as ope,";
            $where .= " cmd.id=ope.commande and ";
            if (isset($data['nom_porteur_cheque'])) {
                $where .= " ope.id  = '" . $data['nom_porteur_cheque'] . "' and ";
            }
            if (isset($data['num_cheque'])) {
                $where .= " ope.numCheque  like '%" . $data['num_cheque'] . "%' and ";
            }


        }
        if (isset($data['paypar'])) {
            $where .= " cmd.caisse  = " . $data['paypar'] . " and ";
        }
        if (isset($data['user'])) {
            $where .= " cmd.user  = " . $data['user'] . " and ";
        }
        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where . " group by cmd.id order by cmd.id DESC
          ";
        $qb = $this->getEntityManager()->createQuery($query);
        // echo $qb->getSQL(); exit;
        return $qb->getResult();
    }
}