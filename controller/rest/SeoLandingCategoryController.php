<?php
class SeoLandingCategoryController extends RestController {
    public function setData(): Response { $data=$this->request->getInputParams(); $category=new SeoLandingCategory($data['id']??null); $category->import((object)$data); $id=$category->save(); return $id===false?$this->returnErrorMessage('Impossibile salvare la categoria'):$this->returnResult(['id'=>$id]); }
    public function delete(): Response { $id=(int)$this->request->getQueryParam('id'); $count=Container::Database()->getRow(sprintf('SELECT COUNT(*) c FROM seo_landing_page WHERE category_id=%d',$id)); $c=(int)(is_array($count)?$count['c']:$count->c); if($c>0){ return $this->returnErrorMessage('Categoria con pagine associate'); } $cat=new SeoLandingCategory($id); return $cat->delete()?$this->returnResult(null):$this->returnErrorMessage('Impossibile eliminare'); }
}
