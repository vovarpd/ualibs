<?php
/**
 * Copyright  2018 Volodymyr Chukh <vovka2008@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 *
 */

namespace UaLibs;

/**
 * Class UaLib
 * @package UaLib
 */
class UaLibs {

	public function __construct() {

	}

	/**
	 * @return array
	 */
	public function get(): array {
		return $this->getUserAgents( null );
	}

	/**
	 * @return null|string
	 */
	public function getRandom(): ?string {
		return array_rand( $this->getUserAgents( null ) );
	}

	/**
	 * @return array
	 */
	public function getAndroid(): array {
		return $this->getUserAgents( 'android' );
	}

	/**
	 * @return null|string
	 */
	public function getAndroidRandom(): ?string {
		return array_rand( $this->getAndroid() );
	}

	/**
	 * @return array
	 */
	public function getChrome(): array {
		return $this->getUserAgents( 'chrome' );
	}

	/**
	 * @return null|string
	 */
	public function getChromeRandom(): ?string {
		return array_rand( $this->getChrome() );
	}

	/**
	 * @return array
	 */
	public function getEdge(): array {
		return $this->getUserAgents( 'edge' );
	}

	/**
	 * @return null|string
	 */
	public function getEdgeRandom(): ?string {
		return array_rand( $this->getEdge() );
	}

	/**
	 * @return array
	 */
	public function getFirefox(): array {
		return $this->getUserAgents( 'firefox' );
	}

	/**
	 * @return null|string
	 */
	public function getFirefoxRandom(): ?string {
		return array_rand( $this->getFirefox() );
	}

	/**
	 * @return array
	 */
	public function getInternetExplorer(): array {
		return $this->getUserAgents( 'ie' );
	}

	/**
	 * @return null|string
	 */
	public function getInternetExplorerRandom(): ?string {
		return array_rand( $this->getInternetExplorer() );
	}

	/**
	 * @return array
	 */
	public function getOpera(): array {
		return $this->getUserAgents( 'opera' );
	}

	/**
	 * @return null|string
	 */
	public function getOperaRandom(): ?string {
		return array_rand( $this->getOpera() );
	}

	/**
	 * @return array
	 */
	public function getSafari(): array {
		return $this->getUserAgents( 'safari' );
	}

	/**
	 * @return null|string
	 */
	public function getSafariRandom(): ?string {
		return array_rand( $this->getSafari() );
	}

	/**
	 * @param null|string $lib
	 *
	 * @return array
	 */
	protected function getUserAgents( ?string $lib ): array {
		if ( ! empty( $lib ) ) {
			$lib_path = __DIR__ . '/libs/' . $lib . '.txt';

			return file_exists( $lib_path ) ? file( $lib_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES ) : [];
		} else {
			$list = [];
			// combine all available libs and return it as array
			foreach ( new \RecursiveIteratorIterator( new \RecursiveDirectoryIterator( __DIR__ . '/libs' ) ) as $filename ) {
				// filter out "." and ".."
				if ( $filename->isDir() ) {
					continue;
				}
				$list = array_merge( $list, file( $filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES ) );
			}
			$list = array_values( array_unique( $list ) );

			return $list;
		}
	}

}