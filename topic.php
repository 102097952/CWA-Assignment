<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset= "utf-8" />
	<meta name= "description" content= "The description page about TCP/IP" />
	<meta name= "keywords" content= "TCP/IP" />
	<meta name= "author" content= "James McKenna" />
	<title>TCP/IP - Infomation</title>
	<link href= "styles/styles.css" rel= "stylesheet" />
	<script src= "scripts/enhancements.js"></script>
</head>

<body>

	<div>
		<ul class="nav" >
			<?php include 'menu.inc'; ?>
		</ul>
	</div>
	
	<header>
		<?php include 'header.inc'; ?>
	</header>
	
	<article>
		<h2>Information</h2>
		
		<button class="Heading">What is TCP/IP</button>
		<section class="panel">
			<aside>
				<figure>
					<figcaption><strong>Data makeup in a TCP/IP packet</strong></figcaption>
					<a href="images/packet.png"><img src="images/packet.png" alt="layout of data packet" /></a>
				</figure>
			</aside>
			
			<p>
				TCPs and IPs are protocols which are used to achieve data transfer between two devices. 
				They both have individual purposes in the process of sending data but are often grouped together as the one protocol often needs the other in order to secure packets successfully reaching the destination. 
				These two protocols are often referred to as the Internet Protocol suite.
			</p>
			<p class="subHeading" >TCP</p>
			<ul class="info" >
				<li>Stands for <em>Transmission Communication Protocol</em></li>
				<li>Ensures a stable connection between two devices before data is sent <a href="#reference">[1]</a></li>
				<li>Seperates the data into packets</li>
				<li>Reorders packets at recieving end when packets arrive randomly <a href="#reference">[2]</a></li>
			</ul>
			<p class="subHeading" >IP</p>
			<ul class="info" >
				<li>Stands of <em>Internet Protocol</em></li>
				<li>Using IP addresses, the protocol encapsulates the sender/reciver info in the data</li>
				<li>IP doesnt check for successful delivery of data, hence why paired with TCP <a href="#reference">[3]</a></li>
			</ul>
			
			<p class="subHeading" >For more infomation:</p>
			<iframe width="420" height="345" src="https://www.youtube.com/embed/PpsEaqJV_A0"></iframe>
			
		</section>
		
		<button class="Heading">History of TCP/IP</button>
		<section class="panel">
			<p>
				In the early 1970’s, the United States had their own communication network called ARPAnet, that used a number of existing commands from other technologies to send data. 
				However, this system had a number of flaws with its standard operation and wasn’t well future proofed in the case of new applications. 
				So, in 1973, the team of the <em>Defence Advanced Research Projects Agency</em> (DARPA) initialised development of the first TCP, which at the time stood for Transmission Control Protocol <a href="#reference">[4]</a>. 
				A major turning point for the development of the Internet Protocol suite came in 1977, when John Postel wrote a document about the current state of the TCP and how the protocol was doing too much of the work, leading to more issues leading into the future. 
				When the TCP was first created, it was doing the jobs of both the TCPs and IPs today, and Postels vision was to split up the TCP into two separate protocols to simplify tasks. 
				This revolution has now lead to the TCP/IP suite used in a majority of communication devices today <a href="#reference">[5]</a>.
			</p>
		</section>
		
		<button class="Heading">Ownership</button>
		<section class="panel">
			<p>
				The standards of TCP/IP aren’t controlled by any particular body, but just a prestigious command that is followed by almost all communication devices as it seems to be one of the simplest methods of sending and securing data. 
				Instead, The Internet Engineering Task Force (IETF) are a non-for-profit organisation that exists to set standards of the internet as it expands, which includes the use of IP suite. 
				This organisation continues to promote the use of the protocols to set the standard of internet data transfer further.
			</p>
		</section>
		
		<button class="Heading">Future of TCP/IP</button>
		<section class="panel">
			<p>
				As of now, the TCP/IP is seen as the leading method for data transfer over the internet, especially as the IETF continue to set the standard. 
				The predominantly used version of the IP suite is IPv4, but an issue with IPv4 as there are a finite amount of IP addresses which plans to be fixed with IPv6 having practically infinite IP addresses <a href="#reference">[6]</a>, developed by the IETF. 
				And with plans to advance this technology, it doesn’t seem that the IP suite is leaving anytime in the near future.
			</p>
		</section>
		
		<button class="Heading">Comparison</button>
		<section class="panel">
			<table>
				<tbody>
					<tr>
						<th scope= "col">ISO Model</th>
						<th scope= "col">TCP/IP Model</th>
					</tr>
					<tr>
						<td>Application</td>
						<td rowspan= "3" >Applications</td>
					</tr>
					<tr>
						<td>Presentaion</td>
					</tr>
					<tr>
						<td>Session</td>
					</tr>
					<tr>
						<td>Transport</td>
						<td>TCP</td>
					</tr>
					<tr>
						<td>Network</td>
						<td>IP</td>
					</tr>
					<tr>
						<td>Data Link</td>
						<td rowspan= "2" >Network Access</td>
					</tr>
					<tr>
						<td>Physical</td>
					</tr>
				</tbody>
			</table>	
			<p>
				The TCP/IP model is often compared to OSI model structure of data transfer. 
				Both use similar techniques within the process of sending the data but their methods of processing are different. 
				The ISO model uses 7 network layers to breakdown data and transfer it, which is meant to be easy to visually see and understand the process of how data is prepared, sent and received over the internet. 
				In contrast, the IP suite only uses 4 network layers, mostly by optimising and combining layers of the ISO into single steps because often in data transfers, some of the layers are skipped depending on how the data is sent. 
				These are how the methods compare <a href="#reference">[7]</a>.
			</p>
		</section>
		
		<section>
		<h3 class="subHeading" id="reference" >References</h3>
			<ol>
				<li><a href= "https://www.techopedia.com/definition/5773/transmission-control-protocol-tcp">https://www.techopedia.com/definition/5773/transmission-control-protocol-tcp</a></li>
				<li><a href= "https://techterms.com/definition/tcp">https://techterms.com/definition/tcp</a></li>
				<li><a href= "https://www.tutorialspoint.com/internet_technologies/internet_protocols.htm">https://www.tutorialspoint.com/internet_technologies/internet_protocols.htm</a></li>
				<li><a href= "http://www.tcpipguide.com/free/t_TCPIPOverviewandHistory.htm">http://www.tcpipguide.com/free/t_TCPIPOverviewandHistory.htm</a></li>
				<li><a href= "http://www.tcpipguide.com/free/t_TCPIPOverviewandHistory-2.htm">http://www.tcpipguide.com/free/t_TCPIPOverviewandHistory-2.htm"</a></li>
				<li><a href= "https://www.ietf.org/about/">https://www.ietf.org/about/</a></li>
				<li><a href= "http://www.ipv6.org.nz/ipv6-faqs/">http://www.ipv6.org.nz/ipv6-faqs/</a></li>
				<li><a href= "http://www.electronicdesign.com/what-s-difference-between/what-s-difference-between-osi-seven-layer-network-model-and-tcpip">http://www.electronicdesign.com/what-s-difference-between/what-s-difference-between-osi-seven-layer-network-model-and-tcpip</a></li>
			</ol>
		</section>
		
		<button onclick="topFunction()" id="topButton" title="Go to top">Go to top</button>
	</article>
	
	<footer>
		<?php include 'footer.inc'; ?>
	</footer>
	
</body>
</html>