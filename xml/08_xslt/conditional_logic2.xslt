<?xml version="1.0"?> 
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

	<xsl:template match="/">
		<html>
		<head>
			<title>Our Items</title>
		</head>
		<body style="background-color:#DACFE5; font-family:Arial, Helvetica, sans-serif">
			<xsl:for-each select="/items/item">

			</xsl:for-each>
		</body>
		</html>
	</xsl:template>

</xsl:stylesheet>
