<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

class CommunityCategoryTable extends Doctrine_Table
{
  //TODO: use findAll()
  public function retrieveAll()
  {
    return $this->createQuery()->execute();
  }

  //TODO: use getTree()->fetchRoots()
  public function retrieveAllRoots($sort = true)
  {
    return $this->getAllRootsQuery($sort)->execute();
  }

  public function getAllRootsQuery($sort = true)
  {
    $q = $this->createQuery()->where('lft = 1');
    if ($sort)
    {
      $q->orderBy('sort_order');
    }

    return $q;
  }

  public function retrieveAllChildren($sort = true)
  {
    return $this->getAllChildrenQuery($sort)->execute();
  }

  public function getAllChildrenQuery($sort = true)
  {
    $q = $this->createQuery()->where('lft > 1');
    if ($sort)
    {
      $q->orderBy('sort_order');
    }

    return $q;
  }

  public function getAllChildren($checkIsAllowMemberCommunity = false)
  {
    $roots = $this->retrieveAllRoots();
    $children = $this->retrieveAllChildren();

    // sort by root category
    $temp = array();
    foreach ($children as $child)
    {
      if ($checkIsAllowMemberCommunity && !$child->getIsAllowMemberCommunity())
      {
        continue;
      }
      $temp[$child->getTreeKey()][] = $child;
    }

    $data = array();
    foreach ($roots as $root)
    {
      if (isset($temp[$root->getId()]))
      {
        $data = array_merge($data, $temp[$root->getId()]);
      }
    }

    $collection = new Doctrine_Collection($this);
    $collection->setData($data);

    return $collection;
  }
}
