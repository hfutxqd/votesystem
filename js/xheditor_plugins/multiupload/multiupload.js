/*!
 * MultiUpload for xheditor
 * @requires xhEditor
 * 
 * @author Yanis.Wang<yanis.wang@gmail.com>
 * @site http://xheditor.com/
 * @licence LGPL(http://www.opensource.org/licenses/lgpl-license.php)
 * 
 * @Version: 0.9.2 (build 100505)
 */
var swfu,selQueue=[],selectID,arrMsg=[],allSize=0,uploadSize=0;
function removeFile()
{
	var file;
	if(!selectID)return;
	for(var i in selQueue)
	{
		file=selQueue[i];
		if(file.id==selectID)
		{
			selQueue.splice(i,1);
			allSize-=file.size;
			swfu.cancelUpload(file.id);
			$('#'+file.id).remove();
			selectID=null;
			break;
		}
	}
	$('#btnClear').hide();
	if(selQueue.length==0)$('#controlBtns').hide();
}
function startUploadFiles()
{
	if(swfu.getStats().files_queued>0)
	{
		$('#controlBtns').hide();
		swfu.startUpload();
	}
	else alert('涓娄紶鍓嶈鍏堟坊锷犳枃浠?);
}
function setFileState(fileid,txt)
{
	$('#'+fileid+'_state').text(txt);
}
function fileQueued(file)//阒熷垪娣诲姞鎴愬姛
{
	for(var i in selQueue)if(selQueue[i].name==file.name){swfu.cancelUpload(file.id);return false;}//阒叉鍚屽悕鏂囦欢閲嶅娣诲姞
	if(selQueue.length==0)$('#controlBtns').show();
	selQueue.push(file);
	allSize+=file.size;
	$('#listBody').append('<tr id="'+file.id+'"><td>'+file.name+'</td><td>'+formatBytes(file.size)+'</td><td id="'+file.id+'_state">灏辩华</td></tr>');
	$('#'+file.id).hover(function(){$(this).addClass('hover');},function(){$(this).removeClass('hover');})
	.click(function(){selectID=file.id;$('#listBody tr').removeClass('select');$(this).removeClass('hover').addClass('select');$('#btnClear').show();})
}
function fileQueueError(file, errorCode, message)//阒熷垪娣诲姞澶辫触
{
	var errorName='';
	switch (errorCode)
	{
		case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
			errorName = "鍙兘鍚屾椂涓娄紶 "+this.settings.file_upload_limit+" 涓枃浠?;
			break;
		case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
			errorName = "阃夋嫨镄勬枃浠惰秴杩囦简褰揿墠澶у皬闄愬埗锛?+this.settings.file_size_limit;
			break;
		case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
			errorName = "板跺ぇ灏忔枃浠?;
			break;
		case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
			errorName = "鏂囦欢镓╁睍鍚嶅繀闇€涓猴细"+this.settings.file_types_description+" ("+this.settings.file_types+")";
			break;
		default:
			errorName = "链煡阌栾";
			break;
	}
	alert(errorName);
}
function uploadStart(file)//鍗曟枃浠朵笂浼犲紑濮?
{
	setFileState(file.id,'涓娄紶涓€?);
}
function uploadProgress(file, bytesLoaded, bytesTotal)//鍗曟枃浠朵笂浼犺繘搴?
{
	var percent=Math.ceil((uploadSize+bytesLoaded)/allSize*100);
	$('#progressBar span').text(percent+'% ('+formatBytes(uploadSize+bytesLoaded)+' / '+formatBytes(allSize)+')');
	$('#progressBar div').css('width',percent+'%');
}
function uploadSuccess(file, serverData)//鍗曟枃浠朵笂浼犳垚锷?
{
	var data=Object;
	try{eval("data=" + serverData);}catch(ex){};
	if(data.err!=undefined&&data.msg!=undefined)
	{
		if(!data.err)
		{
			uploadSize+=file.size;
			arrMsg.push(data.msg);
			setFileState(file.id,'涓娄紶鎴愬姛');
		}
		else
		{
			setFileState(file.id,'涓娄紶澶辫触');
			alert(data.err);
		}
	}
	else setFileState(file.id,'涓娄紶澶辫触锛?);
}
function uploadError(file, errorCode, message)//鍗曟枃浠朵笂浼犻敊璇?
{
	setFileState(file.id,'涓娄紶澶辫触锛?);
}
function uploadComplete(file)//鏂囦欢涓娄紶锻ㄦ湡缁撴潫
{
	if(swfu.getStats().files_queued>0)swfu.startUpload();
	else uploadAllComplete();
}
function uploadAllComplete()//鍏ㄩ儴鏂囦欢涓娄紶鎴愬姛
{
	callback(arrMsg);
}
function formatBytes(bytes) {
	var s = ['Byte', 'KB', 'MB', 'GB', 'TB', 'PB'];
	var e = Math.floor(Math.log(bytes)/Math.log(1024));
	return (bytes/Math.pow(1024, Math.floor(e))).toFixed(2)+" "+s[e];
}