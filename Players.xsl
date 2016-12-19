<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
		<xsl:template match="*">
		<xsl:applytemplates/>
	</xsl:template>
	<xsl:template match="text()">
		<xsl:applytemplates/>
	</xsl:template>
	<xsl:template match="/">
		<html>
			<head>
				<title>Players</title>
			</head>
			<body>
				
				<!--Team Names:-->
				<h2>All Team Names::</h2>
				<xsl:apply-templates select="/site/entry/name"/>
				
				<!--Games-->
				<h2>Game:</h2>
				<xsl:apply-templates select="/site/entry/game"/>
				
				<!--region-->
				<h2>region:</h2>
				<xsl:apply-templates select="/site/entry/region"/>
				
				<!--4. Members-->
				<h2>Members:</h2>
				<xsl:apply-templates select="/site/entry/members/mem"/>
			</body>
		</html>
	</xsl:template>
	

	<xsl:template match="name">
		<p><u><xsl:value-of select="."/></u></p>
	</xsl:template>

	<xsl:template match="game">
		<p><u><xsl:value-of select="."/></u></p>
	</xsl:template>
	

	<xsl:template match="region">
		<p><u><xsl:value-of select="."/></u></p>
	</xsl:template>
	
	<xsl:template match="mem">
		<p><u><xsl:value-of select="."/></u></p>
	</xsl:template>
</xsl:stylesheet>