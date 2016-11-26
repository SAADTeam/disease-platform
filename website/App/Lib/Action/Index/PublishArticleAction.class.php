<?php
/*
 * 发表文章页控制器
 */
class PublishArticleAction extends Action
{
    public function index()
    {
        $publishArticle = M( 'publisharticle' )->order('publishYear desc')->select();
        
        $publishArticleBody = array();
        $tempYear = 0;
        $i = 0;
        foreach ( $publishArticle as $v )
        {
            if( $tempYear != $v['publishYear'] )
            {
                $i = 0;
                $tempYear = $v['publishYear'];
            }
            $publishArticleBody[(string)$tempYear][$i++] = array( 'publishArticleTitle'=>$v['publishArticleTitle'] , 'author'=>$v['author'] , 'publishArticlelink'=>$v['publishArticlelink'] );
        }
        $this->publishArticleBody = $publishArticleBody;
        
        $this->display();
    }

}

