var Validator = artifacts.require("./Validator.sol");
var RovaCoin = artifacts.require("./RovaCoin.sol");
var Crowdsale = artifacts.require("./Crowdsale.sol");


module.exports = function(deployer) {

	var owner = web3.eth.accounts[0];
	var wallet = web3.eth.accounts[1];

	// var owner = '0x6f2010D0FBaf8B7Dbc13eE7252FF8594A2Be3C51';
	// var wallet = '0x532691886A05eDc95457BFd5aEDA9b65b5413c83';

	console.log("Owner address: " + owner);	
	console.log("Wallet address: " + wallet);	

	deployer.deploy(Validator, { from: owner });
	deployer.link(Validator, RovaCoin);
	return deployer.deploy(RovaCoin, { from: owner }).then(function() {
		console.log("RovaCoin address: " + RovaCoin.address);
		return deployer.deploy(Crowdsale, RovaCoin.address, wallet, { from: owner }).then(function() {
			console.log("Crowdsale address: " + Crowdsale.address);
			return RovaCoin.deployed().then(function(coin) {
				return coin.owner.call().then(function(owner) {
					console.log("RovaCoin owner : " + owner);
					return coin.transferOwnership(Crowdsale.address, {from: owner}).then(function(txn) {
						console.log("RovaCoin owner was changed: " + Crowdsale.address);		
					});
				})
			});
		});
	});
};