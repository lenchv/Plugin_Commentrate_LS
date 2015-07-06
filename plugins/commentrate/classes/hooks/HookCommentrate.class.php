<?php
class PluginCommentrate_HookCommentrate extends Hook {
    
	protected $iTopicId = -1;

    public function RegisterHook() {
        $this->AddHook('topic_show','func_topic_show', __CLASS__, 10);
        $this->AddHook('template_commentrate_items','func_commentrate_items', __CLASS__, 5);
    }
	
	public function func_topic_show($aParams) {
		$oTopic = $aParams['oTopic'];
		$this->iTopicId = $oTopic->GetId();
	}

	public function func_commentrate_items() {
		$oUser = $this->User_GetUserCurrent();
		
		if ($iTopicId != -1) {
			if ($this->User_IsAuthorization()) {
	    		$aComments = $this->PluginCommentrate_Commentrate_GetCommentsByUser($iTopicId, $oUser->GetId());
	    	} else {
		    	$aComments = $this->PluginCommentrate_Commentrate_GetCommentsByUser($iTopicId);
	    	}
		} else {
			return "";
		}
    	
    	$this->Viewer_Assign('aCommentrate', $aComments);
    	return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__).'inject.comment_item.tpl');
	}

}

?>