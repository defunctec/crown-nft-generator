# nft-generator
A simple PHP based tool to create NFT's on the Crown blockchain

## Installation guide
You need a VPS with (recommended) 2GB RAM, 1 CPU Core and 20GB hard drive.

Download and install the current Crown daemon and bootstrap to the server
sudo apt-get install curl -y && curl -s https://raw.githubusercontent.com/Crowndev/crowncoin/master/scripts/crown-server-install.sh | bash -s -b

Send a tiny amount of Crown to the daemon, for example (0.001). 

Create a new protocol, editing the appropriate details 
crown-cli nftproto register "Proto-short-name(abc)" "Proto-long-name" "YOUR-Crown-address" 1 "application/json" "" true true

Edit /root/.crown/crown.conf to include your RPC details

Place the crown_de folder inside the root web directory

Place the crownform folder inside wp-content/plugins

Change all RPC details and website server info to your own.

Use the shortcode [crw_registration] to show the NFT generator.

