  
  <td class="sf_admin_text sf_admin_list_td_article_id" field="article_id">
      <?php echo  VtHelper::truncate(adArticlesCommentActions::getArticleName($ad_articles_comment->getArticleId()), 50, '...', true)  ?></td>
  <td class="sf_admin_text sf_admin_list_td_fullname" field="fullname"><?php echo  VtHelper::truncate($ad_articles_comment->getFullname(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_email" field="email"><?php echo  VtHelper::truncate($ad_articles_comment->getEmail(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_content" field="content"><?php echo  VtHelper::truncate($ad_articles_comment->getContent(), 50, '...', true)  ?></td>      
  <td class="sf_admin_boolean sf_admin_list_td_is_active" field="is_active"><?php echo get_partial('adArticlesComment/list_field_boolean', array('value' =>  VtHelper::truncate($ad_articles_comment->getIsActive(), 50, '...', true) )) ?></td>      
  <td class="sf_admin_date sf_admin_list_td_created_at" field="created_at"><?php echo  VtHelper::truncate($ad_articles_comment->getCreatedAt(), 50, '...', true)  ?></td>    