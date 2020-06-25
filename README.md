# crown-nft-generator
A simple PHP based tool to create NFT's on the Crown blockchain

## Installation guide
You need a VPS with (recommended) 2GB RAM, 1 CPU Core and 20GB hard drive.

Download and install the current Crown daemon and bootstrap to the server
sudo apt-get install curl -y && curl -s https://raw.githubusercontent.com/Crowndev/crowncoin/master/scripts/crown-server-install.sh | bash -s -b

Send a tiny amount of Crown to the daemon, for example (0.001). 

You need a existing protocol to create tokens. If you're not using the protocol generator, use this instead on the VPS client. 

Create a new protocol, editing the appropriate details 
crown-cli nftproto register "Proto-short-name(abc)" "Proto-long-name" "YOUR-Crown-address" 1 "application/json" "" true true
eg
crown-cli nftproto register "abc" "alphabet" "CRWKKM8kYa6u5oKAtyjQ98uQqzfMXxD6g284" 1 "application/json" "" true true

In the VPS edit /root/.crown/crown.conf to include your RPC details

Place the crown_de folder inside the root web directory

Place the crown-nft-generator folder inside wp-content/plugins

In the plugin code change all RPC details and URL info to your own.

Use the shortcode [crw_registration] to show the NFT generator.