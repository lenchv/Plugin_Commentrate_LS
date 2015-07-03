<?php

class PluginCommentrate_ModuleCommentrate extends Module {

	public function Init() {}

	/**
	*	@return int id топика из URL
	*/
	public function GetTopicId() {
		$iTopicId = 0;
		preg_match('/(\d+)\.html$/i', Router::GetPathWebCurrent(), $matches);
		$iTopicId = $matches[1];
		return $iTopicId;
	}

	/**
	*	Возвращает 5 комментариев заданного пользовател, или 5 самых популярных, если пользователь не задан
	*	@param int iTargetId id владельца комментариев
	*	@param int iUserId id пользоватея, чьи комментарии выбирать
	*	@return array коллекцию комментариев
	*/
	public function GetCommentsByUser($iTargetId, $iUserId = NULL) {
		/* Формирование фильтра выборки */
		$aFilter = array('target_id' => $iTargetId, 'target_type' => 'topic');
		$aOrder = array();
		/* Если задан пользователь, то фильтровать комментарии также и по пользователю, 
			и сортировать по дате. Если пользователь не задан, то сортировать по рейтингу
		 */
		if ($iUserId != NULL) {
			$aFilter['user_id'] = $iUserId;
			$aOrder['comment_date'] = 'desc';
		} else {
			$aOrder['comment_rating'] = 'desc';
		}
		$aResult = $this->Comment_GetCommentsByFilter($aFilter,$aOrder,1, 5);
		return $aResult['collection'];
	}
}
?>
