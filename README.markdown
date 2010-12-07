[vies.dk](http://vies.dk)
==

This is the previous PHP source code for [Vejle Idrætsefterskole](http://vies.dk). The current code is not currently open source.

Installation
--

Content is served by [Intraface](http://intraface.dk). To check the page on you own server, you need the intraface api credentials.

If you like to do a local installation, do the following:

    pear channel-discover pear.phing.info
    pear install phing/phing
    
After installing phing, you should be able to run:

    phing make
    
That will create a pear package, which will take care of installing all the dependencies for the site.

    pear install VIH_Efterskole-x.x.x.tgz
