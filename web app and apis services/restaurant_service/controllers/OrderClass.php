<?php
class OrderClass{
	public $order_id;
	public $restaurant_user_id;
	public $customer_type;
	public $customer;
	public $order_table;
	public $order_type;
	public $order_datetime;
	public $customer_instruction;
	public $estimated_time;
	public $order_tax;
	public $order_feedback;
	public $order_status;
	
	
	/**
	 * @return the $order_id
	 */
	public function getOrder_id() {
		return $this->order_id;
	}

	/**
	 * @return the $restaurant_user_id
	 */
	public function getRestaurant_user_id() {
		return $this->restaurant_user_id;
	}

	/**
	 * @return the $customer_type
	 */
	public function getCustomer_type() {
		return $this->customer_type;
	}

	/**
	 * @return the $customer
	 */
	public function getCustomer() {
		return $this->customer;
	}

	/**
	 * @return the $order_table
	 */
	public function getOrder_table() {
		return $this->order_table;
	}

	/**
	 * @return the $order_type
	 */
	public function getOrder_type() {
		return $this->order_type;
	}

	/**
	 * @return the $order_datetime
	 */
	public function getOrder_datetime() {
		return $this->order_datetime;
	}

	/**
	 * @return the $customer_instruction
	 */
	public function getCustomer_instruction() {
		return $this->customer_instruction;
	}

	/**
	 * @return the $estimated_time
	 */
	public function getEstimated_time() {
		return $this->estimated_time;
	}

	/**
	 * @return the $order_tax
	 */
	public function getOrder_tax() {
		return $this->order_tax;
	}

	/**
	 * @return the $order_feedback
	 */
	public function getOrder_feedback() {
		return $this->order_feedback;
	}

	/**
	 * @return the $order_status
	 */
	public function getOrder_status() {
		return $this->order_status;
	}

	/**
	 * @param field_type $order_id
	 */
	public function setOrder_id($order_id) {
		$this->order_id = $order_id;
	}

	/**
	 * @param field_type $restaurant_user_id
	 */
	public function setRestaurant_user_id($restaurant_user_id) {
		$this->restaurant_user_id = $restaurant_user_id;
	}

	/**
	 * @param field_type $customer_type
	 */
	public function setCustomer_type($customer_type) {
		$this->customer_type = $customer_type;
	}

	/**
	 * @param field_type $customer
	 */
	public function setCustomer($customer) {
		$this->customer = $customer;
	}

	/**
	 * @param field_type $order_table
	 */
	public function setOrder_table($order_table) {
		$this->order_table = $order_table;
	}

	/**
	 * @param field_type $order_type
	 */
	public function setOrder_type($order_type) {
		$this->order_type = $order_type;
	}

	/**
	 * @param field_type $order_datetime
	 */
	public function setOrder_datetime($order_datetime) {
		$this->order_datetime = $order_datetime;
	}

	/**
	 * @param field_type $customer_instruction
	 */
	public function setCustomer_instruction($customer_instruction) {
		$this->customer_instruction = $customer_instruction;
	}

	/**
	 * @param field_type $estimated_time
	 */
	public function setEstimated_time($estimated_time) {
		$this->estimated_time = $estimated_time;
	}

	/**
	 * @param field_type $order_tax
	 */
	public function setOrder_tax($order_tax) {
		$this->order_tax = $order_tax;
	}

	/**
	 * @param field_type $order_feedback
	 */
	public function setOrder_feedback($order_feedback) {
		$this->order_feedback = $order_feedback;
	}

	/**
	 * @param field_type $order_status
	 */
	public function setOrder_status($order_status) {
		$this->order_status = $order_status;
	}

	
}

?>