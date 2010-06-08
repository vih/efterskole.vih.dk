vies.dk
==

This is the previous PHP source code for [Vejle Idrætsefterskole](http://vies.dk). The current code is not currently open source.

Installation
--

It is served up by [Intraface](http://intraface.dk). To really check the page on you own server, you need the credentials for their site on intraface.

If you like to do a local installation, it best way right now is to do the following:

    pear channel-discover pear.phing.info
    pear install phing/phing
    
After installing phing, you should be able to just run:

    phing make
    
That will create a pear package, which will take care of installing all the dependencies when installing it.

    pear install VIH_Efterskole-x.x.x.tgz
