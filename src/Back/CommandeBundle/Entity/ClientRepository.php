<?php

namespace Back\CommandeBundle\Entity;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * ClientRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClientRepository extends EntityRepository
    implements UserProviderInterface
{

    public function getClientfilterParEmail($query1)
    {
        $query = $this->getEntityManager()
            ->createQuery("select client  from
                            Back\CommandeBundle\Entity\Client as client
                            where client.email like '%" . $query1 . "%'
                            order by client.id DESC
                            ");
//echo $query->getSQL(); exit;
        return $query->getResult();
    }


    public function getNombreinscrits($dateD,$dateF)
    {
        return $this->createQueryBuilder('l')
            ->select('COUNT(l)')
            ->where('l.dcr > :dated')
            ->setParameter('dated',$dateD)
            ->andWhere('l.dcr < :datef')
            ->setParameter('datef',$dateF)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getClientNombreinscrits($dateD,$dateF)
    {
        return $this->createQueryBuilder('l')
            ->select('l')
            ->where('l.dcr > :dated')
            ->setParameter('dated',$dateD)
            ->andWhere('l.dcr < :datef')
            ->setParameter('datef',$dateF)
            ->getQuery()
            ->getResult();
    }



        public function getNombreValider($dateD,$dateF)
    {
        return $this->createQueryBuilder('l')
            ->select('COUNT(l)')
            ->where('l.dcr > :dated')
            ->setParameter('dated',$dateD)
            ->andWhere('l.dcr < :datef')
            ->setParameter('datef',$dateF)
            ->andWhere('l.stat = 1 ')
            ->getQuery()
            ->getSingleScalarResult();
    }


    public function getClientNombreValider($dateD,$dateF)
    {
        return $this->createQueryBuilder('l')
            ->select('l')
            ->where('l.dcr > :dated')
            ->setParameter('dated',$dateD)
            ->andWhere('l.dcr < :datef')
            ->setParameter('datef',$dateF)
            ->andWhere('l.stat = 1 ')
            ->getQuery()
            ->getResult();
    }

    public function getClientfilterParTel($query1)
    {
        $query = $this->getEntityManager()
            ->createQuery("select client  from
                            Back\CommandeBundle\Entity\Client as client
                            where client.phone like '%" . $query1 . "%'
                            order by client.id DESC
                            ");
//echo $query->getSQL(); exit;
        return $query->getResult();
    }

    public function getClientfilterParNom($query1)
    {
        $query = $this->getEntityManager()
            ->createQuery("select client  from
                            Back\CommandeBundle\Entity\Client as client

                            where client.name like '%" . addslashes($query1) . "%'
                            group by client.name

                            ");

        return $query->getResult();
    }
    public function getClientfilterParPrenom($query1)
    {
        $query = $this->getEntityManager()
            ->createQuery("select client  from
                            Back\CommandeBundle\Entity\Client as client

                            where client.fname like '%" . addslashes($query1) . "%'
                            group by client.fname
                            ");

        return $query->getResult();
    }
    public function getCommented(){
        $query=$this->createQueryBuilder("c")
            ->join('Back\DealBundle\Entity\Vote', 'cmt')
            ->where('c.id = cmt.voter');
       // echo $query->getQuery()->getSQL();exit;
        return $query;
        $sql = "select cli ";
        $from = " from Back\CommandeBundle\Entity\Client as cli, ";
        $from .= "  Back\DealBundle\Entity\Vote as cmt ";
        $where = " where cmt.voter=cli.id ";

        $query = $sql . $from . $where . "  ";
        $qb = $this->getEntityManager()->createQuery($query);

        return $qb;
    }
    public function findBy1(array $criteria, array $orderBy = null, $limit = null, $offset = null){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $expr = $this->getEntityManager()->getExpressionBuilder();
        $qb->select( 'entity' )
            ->from( $this->getEntityName(), 'entity' );

        foreach ( $criteria as $field => $value ) {
            if(!is_numeric($value)){
              //  echo $field; exit;
                if($field=="nom")
                {
                    $fieldName = "name";
                    $qb->andWhere(  'entity.' . $fieldName. " like '%".$value."%'" );


                }
                elseif($field=="prenom")
                {
                    $fieldFName = "fname";
                    $qb->andWhere(  'entity.' . $fieldFName. " like '%".$value."%'" );
                  //  $qb->andWhere(  'entity.' . $fieldFName. " like '%".$fname."%'" );


                }
                else
                    $qb->andWhere(  'entity.' . $field. " like '%".$value."%'" );
            }else{

                if( $field=="phone" or $field=="email")
                $qb->andWhere( 'entity.' . $field ." like '%".$value."%'"   );
            }

        }

        if ( $orderBy ) {

            foreach ( $orderBy as $field => $order ) {

                $qb->addOrderBy( 'entity.' . $field, $order );
            }
        }
        $qb->addOrderBy( 'entity.id ' , 'DESC' );

        if ( $limit )
            $qb->setMaxResults( $limit );

        if ( $offset )
            $qb->setFirstResult( $offset );
       //echo $qb->getQuery()->getSQL();exit;
        return $qb;
    }

    public function getQueryBuilderNomPrenom()
    {
        $sql = "select cli.name,cli.fname ";
        $from = " from Back\CommandeBundle\Entity\Client as cli ";
        $where = " where (1=1) and";
        $where = substr($where, 0, -4);
        $from = substr($from, 0, -1);
        $query = $sql . $from . $where . "  order by cli.name DESC
          ";
        $qb = $this->getEntityManager()->createQuery($query);

        return $qb->getResult();
    }

    public function loadUserByUsername($email) {
        return $this->getEntityManager()
            ->createQuery('SELECT c FROM
         BackCommandeBundle:Client c
         WHERE c.email = :email
         OR c.email = :email')
            ->setParameters(array(
                'email' => $email
            ))
            ->getOneOrNullResult();
    }

    public function refreshUser(UserInterface $user) {
        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class) {
        return $class === 'Surgeworks\CoreBundle\Entity\User';
    }

    public function findVillesLike( $term, $limit = 10 )
    {


        $qb = $this->createQueryBuilder('c');
        $qb->select('c.name, c.fname')
            ->where('c.name LIKE :term')
            ->setParameter('term', '%'.$term.'%')
            ->setMaxResults($limit);

        $arrayAss= $qb->getQuery()
            ->getArrayResult();

        // Transformer le tableau associatif en un tableau standard
        $array = array();
        foreach($arrayAss as $data)
        {
            $array[] = array("client"=>$data['client'], "commande"=>$data['fname']);
        }

        return $array;
    }

    public function findLikeName( $term, $limit = 10 )
    {
        $qb = $this->createQueryBuilder('u')  //add select and array for JSON
            ->where('u.name LIKE :string')
            ->orWhere('u.fname LIKE :string1')
            ->setParameter('string','%'.$term.'')
            ->setParameter('string1','%'.$term.'')
            ->setMaxResults($limit);

       // echo $qb->getQuery()->getSQL(); exit;
        $arrayAss= $qb->getQuery()
            ->getArrayResult();

        // Transformer le tableau associatif en un tableau standard
        $array = array();
        foreach($arrayAss as $data)
        {
            $array[] = $data['name']. " " .$data['fname'];
        }

        return $array;
    }
}
