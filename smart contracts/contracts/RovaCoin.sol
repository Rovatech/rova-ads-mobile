pragma solidity ^0.4.11;

import "./StandardToken.sol";
import "./Ownable.sol";


/**
 *  Rova Coin token contract. Implements
 */
contract RovaCoin is StandardToken, Ownable {
  string public constant name = "RovaCoin";
  string public constant symbol = "ROVA";
  uint public constant decimals = 6;


  // Constructor
  function RovaCoin() {
      totalSupply = 1000000000000000;
      balances[msg.sender] = totalSupply; // Send all tokens to owner
  }

  /**
   *  Burn away the specified amount of RovaCoin tokens
   */
  function burn(uint _value) onlyOwner returns (bool) {
    balances[msg.sender] = balances[msg.sender].sub(_value);
    totalSupply = totalSupply.sub(_value);
    Transfer(msg.sender, 0x0, _value);
    return true;
  }

}






