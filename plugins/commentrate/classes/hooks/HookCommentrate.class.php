<?php
class PluginCommentrate_HookCommentrate extends Hook {
    
    public function RegisterHook() {
        $this->AddHook('topic_show','func_topic_show', __CLASS__, 10);
    }
	
	public function func_topic_show($aParams) {
		$oTopic = $aParams['oTopic'];
		$this->Viewer_AddBlock('right', 'commentrate', array('plugin'=>'Commentrate', 'TopicID' => $oTopic->GetId()), 250);
	}

}

?>