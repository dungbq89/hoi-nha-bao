<?php

/**
 * AdArticlesComment filter form.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdArticlesCommentFormFilter extends BaseAdArticlesCommentFormFilter
{
  public function configure()
  {
      $this->setWidgets(array(
          'article_id' => new sfWidgetFormFilterInput(array('with_empty'=>false)),
          'fullname'   => new sfWidgetFormFilterInput(),
          'email'      => new sfWidgetFormFilterInput(),
          'content'    => new sfWidgetFormFilterInput(),
          'is_active'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      ));

      $this->setValidators(array(
          'article_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
          'fullname'   => new sfValidatorPass(array('required' => false)),
          'email'      => new sfValidatorPass(array('required' => false)),
          'content'    => new sfValidatorPass(array('required' => false)),
          'is_active'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      ));

      $this->widgetSchema->setNameFormat('ad_articles_comment_filters[%s]');

      $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
