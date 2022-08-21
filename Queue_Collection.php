<?php

namespace Tribe\Libs\Queues;

use Tribe\Libs\Queues\Contracts\Queue;

class Queue_Collection {

	protected $instances = [];

	public function add( Queue $queue ) {
		$this->instances[ $queue->get_name() ] = $queue;
	}

	public function queues() {
		return $this->instances;
	}

	/**
	 * @param string $queue_name
	 *
	 * @return Queue
	 */
	public function get( $queue_name ) {
		if ( isset( $this->instances[ $queue_name ] ) ) {
			return $this->instances[ $queue_name ];
		}

		throw new \DomainException( __( 'Queue does not exist', 'tribe' ) );
	}

	public function remove( $queue_name ) {
		if ( isset( $this->instances[ $queue_name ] ) ) {
			unset( $this->instances[ $queue_name ] );
		}
	}

}
