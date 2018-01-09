 <{if isset($smarty.session.userInfo)}>
        <{else}>
        <textarea placeholder="请先登录再评论... 单击登录" title="Ctrl+Enter快捷提交" name="content" disabled></textarea><pre class="ds-hidden-text"></pre>
    </div>
        <div class="ds-post-toolbar">
        <div class="ds-post-options ds-gradient-bg"><span class="ds-sync"></span>
        </div>
        <button type="button" class="ds-post-button" onclick="window.location.href='index.php' " >登录</button>
        <div class="ds-toolbar-buttons"><a title="插入表情" class="ds-toolbar-button ds-add-emote"></a>
        </div>
        </div>
        <{/if}>
