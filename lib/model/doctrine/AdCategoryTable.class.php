<?php

/**
 * AdCategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdCategoryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdCategoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdCategory');
    }

    public static function checkSlug($slug, $id)
    {
        $query = AdCategoryTable::getInstance()->createQuery()
            ->select('slug')
            ->where('slug=?', $slug)
            ->andWhere('id<>?', $id);
        return $query;
    }
    public static function getCategoryById($id)
    {
        $query = AdCategoryTable::getInstance()->createQuery()
            ->select('level,name')
            ->Where('id=?', $id);
        return $query->fetchOne();
    }

    public static function getCategoryByPermission($permission)
    {
        //        $permission=sfGuardPermissionTable::getPermissionByName($permissionName);

        if ($permission != null) {
            $strCat = VtpCategoryPermissionTable::getCatgoryIdByPermission($permission);
            if ($strCat != '') {
                $query = AdCategoryTable::getInstance()->createQuery()
                    ->select('name, parent_id, level, priority')

                    ->andWhereIn('id', explode(',', $strCat))

                    ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
                    ->orderby('priority asc');
                $arrCat = $query->execute();
                $arrResult = array();
                $i18n = sfContext::getInstance()->getI18N();
                $arrResult[''] = $i18n->__('---Chọn chuyên mục---');
                foreach ($arrCat as $cat) {
                    $strTab = '';
                    if ($cat->level > 0) {
                        for ($i = 0; $i < $cat->level; $i++) {
                            $strTab = $strTab . '...';
                        }
                    }
                    $arrResult[$cat->id] = $strTab . $cat->name;
                }
                return $arrResult;
            } else {
                $i18n = sfContext::getInstance()->getI18N();
                $arrResult[''] = $i18n->__('---Chọn chuyên mục---');
                return $arrResult;
            }
        } else {
            $i18n = sfContext::getInstance()->getI18N();
            $arrResult[''] = $i18n->__('---Chọn chuyên mục---');
            return $arrResult;
        }
    }

    public static function getCategoryByType($listChild,$is_category=false)
    {
        $query = AdCategoryTable::getInstance()->createQuery()
            ->select('name, parent_id, level, priority')

            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        if ($listChild != '') {
            $query->andWhereNotIn('id', explode(',', $listChild));
        }
        if($is_category){
            $query->andWhere('is_category=1');
        }
        $arrCat = $query->execute();
        $arrResult = array();
        $i18n = sfContext::getInstance()->getI18N();
        $arrResult[''] = $i18n->__('---Chọn chuyên mục---');
        foreach ($arrCat as $cat) {
            $strTab = '';
            if ($cat->level > 0) {
                for ($i = 0; $i < $cat->level; $i++) {
                    $strTab = $strTab . '...';
                }
            }
            $arrResult[$cat->id] = $strTab . $cat->name;
        }

        return $arrResult;
    }

    //Cập nhật thứ tự
    public static function updateOrder($categoryId, $parent_id, $level, $priority)
    {
        $query = AdCategoryTable::getInstance()->createQuery()
            ->update()
            ->set('parent_id', '?', $parent_id)
            ->set('level', '?', $level)
            ->set('priority', '?', $priority)
            ->where('id=?', $categoryId);
        return $query->execute();
    }

    public static function getAllCategory($type)
    {
        $query = AdCategoryTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        return $query->execute();
    }

    //danh cho backend, neu dung cho frontend thi viet ra mot ham khac

    public static function getCategoryByParentID( $parentId)
    {
        $query = AdCategoryTable::getInstance()->createQuery()
            ->andWhere(($parentId != '') ? 'parent_id=?' : '(parent_id=? or parent_id is null)', $parentId)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        return $query->execute();
    }

    public static function getListCategory($strCat)
    {
        $query = AdCategoryTable::getInstance()->createQuery()
            ->andWhereIn('id', explode(',', $strCat))
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        return $query->execute();
    }

    //Lấy các category cùng mức
    public static function getCategoryByLevel($parentId)
    {
        $query = AdCategoryTable::getInstance()->createQuery()

            ->andWhere(($parentId != '') ? 'parent_id=?' : '(parent_id=? or parent_id is null)', $parentId)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        return $query->execute();
    }

    public static function getCategoryByPriority( $priority)
    {
        $query = AdCategoryTable::getInstance()->createQuery()

            ->andWhere('priority > ?', $priority)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        return $query->execute();
    }

    /*
     * Frontend Begin
     */

    public static function getActiveCategoryQuery()
    {
        return AdCategoryTable::getInstance()->createQuery('c')
            ->where('c.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('c.is_active=?', VtCommonEnum::NUMBER_ONE);

    }

    public static function getActiveCategoryWithParentSlugQuery($slug)
    {
        return self::getActiveCategoryQuery()
            ->leftJoin('c.VtpParentCategory p')
            ->andWhere('p.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('p.slug=?', $slug)
            ->andWhere('p.is_active=?', VtCommonEnum::NUMBER_ONE);
    }

    public static function getActiveCategoryWithChildSlugQuery($slug)
    {
        return AdCategoryTable::getInstance()->createQuery('p')
            ->leftJoin('p.ParentCategory c')
            ->where('p.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('p.is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('p.slug=?', $slug)
            ->andWhere('c.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('c.is_active=?', VtCommonEnum::NUMBER_ONE);
    }

    public static function getActiveCategorySpecSlugQuery($slug)
    {
        return AdCategoryTable::getInstance()->createQuery('p')
            ->leftJoin('p.ParentCategory c')
            ->where('p.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('p.is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('p.slug=?', $slug);
        //            ->andWhere('c.is_active=?', VtCommonEnum::NUMBER_ONE);
    }

    public static function getCategoryBySlug($slug)
    {
        return self::getActiveCategoryQuery()
            ->select('c.name, c.slug')
            ->andWhere('c.slug=?', $slug)
            ->fetchOne();
    }

    //ngoctv: getCategory for Breakum
    public static function getListParentByParent($id)
    {
        return self::getActiveCategoryQuery()
            ->select('c.id, c.name, c.slug, c.parent_id')
            ->andWhere('c.id=?', $id)
            ->fetchOne();
    }

    //Lay parent theo slug
    public static function getListCategoryBySlug($slug)
    {
        return self::getActiveCategoryWithParentSlugQuery($slug)
            ->select('c.id, c.name, c.description, c.image_path, c.parent_id, c.slug, c.link, p.name, p.slug')
            ->orderBy('c.priority asc')
            ->fetchArray();

    }

    public static function getArrCatIdBySlug($slug)
    {
        return self::getActiveCategorySpecSlugQuery($slug)
            ->select('c.id, p.id')
            ->orderBy('c.priority asc')
            ->fetchArray();

    }

    public static function getLimitCategoryByParentID( $parentId, $limit)
    {
        return self::getActiveCategoryQuery()
            ->select('c.id, c.name, c.slug, c.link')

            ->andWhere(($parentId != '') ? 'c.parent_id=?' : '(c.parent_id=? or c.parent_id is null)', $parentId)
            ->limit($limit)
            ->orderby('c.priority asc')
            ->execute();
    }

    public static function getServiceCategoryByParentID($parentId, $limit)
    {
        return self::getActiveCategoryQuery()
            ->select('c.id, c.name, c.slug, c.link')
            ->andWhere(($parentId != '') ? 'c.parent_id=?' : '(c.parent_id=? or c.parent_id is null)', $parentId)
            ->andWhere('c.is_show_cat=?', VtCommonEnum::NUMBER_ONE)
            ->limit($limit)
            ->orderby('c.priority asc')
            ->execute();
    }



    //Lay danh sach tat ca chuyen muc con theo catid va chinh no
    public static function getListCategoryByParent($parent_id = null)
    {
        return self::getActiveCategoryQuery()
            ->select('c.id, c.name, c.slug, c.link')
            ->distinct()
            ->leftJoin('c.ArticleCategory a')
                ->andWhere(($parent_id != null || $parent_id != '') ? 'c.parent_id=?' : '(c.parent_id=? or c.parent_id is null)', $parent_id)
            ->orWhere('c.id=?', $parent_id)
            ->orderby('priority asc')
            ->execute();
    }

    //Lay category theo id, return array
    public static function getCateById($id)
    {
        $query = AdCategoryTable::getInstance()->createQuery()
            ->select('level,name')
            ->Where('id=?', $id);
        return $query->fetchArray();
    }

    public static function getCategoryByTypeClone($listChild)
    {
        $query = AdCategoryTable::getInstance()->createQuery()
            ->select('name, parent_id, level, priority')


            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        if ($listChild != '') {
            $query->andWhereNotIn('id', explode(',', $listChild));
        }
        $arrCat = $query->execute();
        $arrResult = array();
        $i18n = sfContext::getInstance()->getI18N();
        $arrResult[0] = $i18n->__('---Chọn chuyên mục---');
        foreach ($arrCat as $cat) {
            $strTab = '';
            if ($cat->level > 0) {
                for ($i = 0; $i < $cat->level; $i++) {
                    $strTab = $strTab . '...';
                }
            }
            $arrResult[$cat->slug] = $strTab . htmlspecialchars($cat->name);
        }

        return $arrResult;
    }

    //get slug by di
    public static function getSlugById($id)
    {
        return AdCategoryTable::getInstance()->createQuery()
            ->select('slug')
            ->where('id=?', $id)
            ->fetchOne();
    }

    /*
     * Frontend end
     */

    /*
     * huync2: lay category action theo slug
     */

    public function getActiveCategoryQueryNew($slug)
    {
        return $this->createQuery('c')
            ->where('c.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('c.is_active=?', VtCommonEnum::NUMBER_ONE)
            //->andWhere('is_show_cat=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('c.slug=?', $slug);
    }

    public function getActiveCategoryWithParentIdQueryNew($parentId)
    {
        return $this->createQuery('c')
            ->where('c.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('c.is_active=?', VtCommonEnum::NUMBER_ONE)
            ->leftJoin('c.VtpParentCategory p')
            ->andWhere('p.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('p.id=?', $parentId)
            ->andWhere('p.is_active=?', VtCommonEnum::NUMBER_ONE)
            ->orderBy('c.priority desc');
    }

    // lay danh sach category


    public function getListActiveCategoryQueryNew($parentId)
    {
        $strListId = AdCategoryTable::getCategoryByParent($parentId);

        return $this->createQuery('c')
            ->where('c.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('c.is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('is_show_cat=?', VtCommonEnum::NUMBER_ONE)
            ->whereIn('c.id', explode(',', $strListId));
    }



    public static function getCategoryByIdFront($id)
    {
        return self::getActiveCategoryQuery()
            ->select('c.name, c.slug')
            ->andWhere('c.id=?', $id)
            ->fetchOne();
    }

    // lay toan bo id theo cha
    public static function getCategoryByParent($category_id)
    {
        $strCat = $category_id;
        $lstCat = AdCategoryTable::getCategoryByParentID($category_id);
        if (count($lstCat) > 0) {
            foreach ($lstCat as $item) {
                $strCat .= ',' . self::getCategoryByParent($item->id);
            }
        }
        if (VtHelper::endsWith($strCat, ',')) {
            $strCat = substr($strCat, 0, strlen($strCat) - 1);
        }
        return $strCat;
    }
    //lay danh sach chuyen muc tin tuc
    public static function getCategoryFrontend($limit=null){
        $query = self::getActiveCategoryQuery()
            ->andWhere('c.is_category=?',VtCommonEnum::NUMBER_ONE);
        if($limit){
            $query->limit($limit);
        }
        return $query;
    }

    //lay danh sach chuyen muc tin tuc
    public static function getCategoryFrontendHot($limit=null){
        $query = self::getActiveCategoryQuery()
            ->andWhere('c.is_category=?',VtCommonEnum::NUMBER_ONE)
            ->andWhere('c.is_hot=?',VtCommonEnum::NUMBER_ONE);
        if($limit){
            $query->limit($limit);
        }
        return $query;
    }

}