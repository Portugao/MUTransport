{* Purpose of this template: 1st step of init process: welcome and information *}

<h2>{gt text="Installation of MUTransport"}</h2>

<dl style="margin-left: 50px">
	<dt style="font-weight: 700">{gt text="Features of MUTransport"}</dt>
	<dd>{gt text="MUTransport is a modul for transporting content !"}</dd>
	<dt style="font-weight: 700">{gt text="transport from modul News to Content"}</dt>
	<dd>{gt text="Have an overwiew about the pages in News and transport them, if you wish !"}</dd>
	<dt style="font-weight: 700">{gt text="transport from modul Pages to Content"}</dt>
	<dd>{gt text="Have an overwiew about the pages in Pages and transport them, if you wish !"}</dd>
	<dt style="font-weight: 700">{gt text="transport from modul PagEd to Content"}</dt>
	<dt style="font-weight: 700">{gt text="transport from modul PagEd to News"}</dt>
	<dd>{gt text="Have an overwiew about the pages in PagEd and transport them, if you wish !"}</dd>
	<dt style="font-weight: 700">{gt text="transport from modul Reviews to Content"}</dt>
	<dd>{gt text="Have an overwiew about the pages in Reviews and transport them, if you wish !"}</dd>
	<dt style="font-weight: 700">{gt text="copy from modul Content to Content"}</dt>
	<dd>{gt text="New! "}{gt text="Have an overwiew about the pages and users of a wordpress installation and transport them !"}</dd>
	<dt style="font-weight: 700">{gt text="transport pages and users from wordpress to your Zikula system"}</dt>
	<dt style="font-weight: 700">{gt text="Make some settings"}</dt>
	<dd>{gt text="enable and disable modules, set a paths for images, choose text or html format and some more !"}</dd>
</dl>
{insert name='csrftoken' assign='csrftoken'}
    <p><a href="{modurl modname='MUTransport' type='interactiveinstaller' func='step2' csrftoken=$csrftoken activate=$activate}" title="{gt text='Continue the installation'}">
        {gt text='Continue the installation'}
    </a></p>