<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends HomeController{

	public function index(){
		$this->title = "找人";
		$p = F('mongo');
		$this->dv = $p;
		$this->display();
	}

	public function mp(){
		$this->title = "写名片";
		$this->display();
	}

	public function uppicPost(){
		import("ORG.Net.UploadFile");
		$upload = new \UploadFile();
		$upload->saveRule = md5(time().$_FILES['Filedata']['name']);
		$upload->savePath = './Public/Uploads/';
		$info = $upload->upload();
		if(!$info) {
			$this->error($upload->getErrorMsg());
		}else{
			$info = $upload->getUploadFileInfo();
			$this->ajaxReturn($info[0]['savename']);
		}
	}

	public function test(){
		$d = I();
		if(!$d['username']){
			$this->ajaxReturn(array('status'=>0,'tips'=>'用户名必须填写!'));
		}
		if(!$d['company']){
			$this->ajaxReturn(array('status'=>0,'tips'=>'请填写您的公司名!'));
		}
		if(!$d['job']){
			$this->ajaxReturn(array('status'=>0,'tips'=>'请填写您的职位信息!'));
		}
		if(!$d['info']){
			$this->ajaxReturn(array('status'=>0,'tips'=>'至少写上一个介绍信息哦!'));
		}
		$nd = F('mongo') ? F('mongo') : array();
		$nd[] = $d;
		F('mongo',$nd);
		$this->ajaxReturn(array('status'=>1,'tips'=>'success!','data'=>$nd));
	}


}