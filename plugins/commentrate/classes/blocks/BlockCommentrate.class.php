<?php

class PluginCommentrate_BlockCommentrate extends Block {
    public function Exec() {
    	$iTopicId = $this->PluginCommentrate_Commentrate_GetTopicId();
    	$oUser = $this->User_GetUserCurrent();

    	if ($this->User_IsAuthorization()) {
    		$aComments = $this->PluginCommentrate_Commentrate_GetCommentsByUser($iTopicId, $oUser->GetId());
    	} else {
	    	$aComments = $this->PluginCommentrate_Commentrate_GetCommentsByUser($iTopicId);
    	}
    	
    	$this->Viewer_Assign('aCommentrate', $aComments);
    }
}
?>
