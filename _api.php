<?php
/**
 * This file pulls in member/affiliate data from the json files
 * and defines helper functions that may be used throughout the website
 */

class NiwaDataHelper
{
	/**
	 * JSON object of member wikis
	 * 
	 * @var object
	 */
	protected $memberWikis;

	/**
	 * JSON object of affiliate wikis
	 * 
	 * @var object
	 */
	protected $affiliates;

	const URL_REPLACE_STRING = "$1";

	function __construct()
	{
		$this->memberWikis = json_decode(
			file_get_contents("data/members.json")
		);
		$this->affiliates = json_decode(
			file_get_contents("data/affiliates.json")
		);
	}

	/**
	 * Return all member wikis or if language code given,
	 * all wikis for that language code.
	 * 
	 * @param string $languageCode
	 * @return object
	 */
	public function getMemberWikis($languageCode = null)
	{
		if ($languageCode) {
			return $this->memberWikis->{$languageCode};
		}
		return $this->memberWikis;
	}

	/**
	 * Return the affiliates
	 * 
	 * @return object
	 */
	public function getAffiliates()
	{
		return $this->affiliates;
	}

	/**
	 * Returns a link for the given Wiki interwiki url and page
	 * 
	 * @param string $url Interwiki URL
	 * @param string $page Wiki page
	 * @return string
	 */
	public function getWikiLink($url, $page = "")
	{
		return str_replace(self::URL_REPLACE_STRING, $page, $url);
	}

	/**
	 * Returns a given wiki's mainpage
	 * 
	 * @param object $wiki
	 * @return string
	 */
	public function getWikiMainpage($wiki)
	{
		return $this->getWikiLink($wiki->url, $wiki->mainpage);
	}

	/**
	 * Generates a link for the member or affiliate
	 * 
	 * @param string $url The anchor tag href
	 * @param string $text The anchor tag display text
	 * @return string
	 */
	protected function generateMemberLink($url, $text)
	{
		return "<a class='member-wiki-link' href='{$url}'>{$text}</a>";
	}

	/**
	 * Generates the html string for Links with error checking for wikis that do not have
	 * one of the options.
	 *
	 * Requires a individual wiki array from the api.
	 * 
	 * @param object $member
	 * @return string $links
	 */
	public function generateMemberLinks($member)
	{
		// Check if wiki mainpage is specified or if we should just use the URL as-is
		if (isset($member->mainpage)) {
			$links = $this->generateMemberLink(
				$this->getWikiMainpage($member),
				$member->title
			);
		} else {
			$links = $this->generateMemberLink(
				$member->url,
				$member->title
			);
		}

		if (isset($member->site)) {
			$links .= $this->generateMemberLink($member->site, $member->siteName);
		}; /*
		if (isset($member->forums)) {
			$links .= $this->generateMemberLink($member->forums, "Forums");
		};
		if (isset($member->chat)) {
			$links .= $this->generateMemberLink($member->chat, "Chat");
		};
		if (isset($member->discord)) {
			$links .= $this->generateMemberLink($member->discord, "Discord");
		};
		if (isset($member->guilded)) {
			$links .= $this->generateMemberLink($member->guilded, "Guilded");
		};
		if (isset($member->twitter)) {
			$links .= $this->generateMemberLink($member->twitter, "Twitter");
		};
		if (isset($member->twitch)) {
			$links .= $this->generateMemberLink($member->twitch, "Twitch");
		};
		if (isset($member->facebook)) {
			$links .= $this->generateMemberLink($member->facebook, "Facebook");
		};*/

		return $links;
	}
	
	/**
	 * Generates a social media icon-based link for the member or affiliate
	 * 
	 * @param string $url The anchor tag href
	 * @param string $imgsrc The image source for the link
	 * @return string
	 */
	protected function generateMemberSocialIcon($url, $social, $socialicon)
	{
		return "<a class='social-media-icon-link' href='{$url}' title='{$social}' target='_blank'><i class='{$socialicon}'></i></a>";
	}
	
	/**
	 * Generates the html string for social media links with error checking for wikis that do not have
	 * one of the options.
	 *
	 * Requires a individual wiki array from the api.
	 * 
	 * @param object $member
	 * @return string $socials
	 */
	public function generateSocialMediaLinks($member)
	{
		if (isset($member->forums)) {
			$socials .= $this->generateMemberSocialIcon($member->forums, "Forums", "fa-solid fa-message");
		};
		if (isset($member->chat)) {
			$socials .= $this->generateMemberSocialIcon($member->chat, "Chat", "fa-solid fa-comments");
		};
		if (isset($member->discord)) {
			$socials .= $this->generateMemberSocialIcon($member->discord, "Discord", "fa-brands fa-discord");
		};
		if (isset($member->guilded)) {
			$socials .= $this->generateMemberSocialIcon($member->guilded, "Guilded", "fa-brands fa-guilded");
		};
		if (isset($member->bluesky)) {
			$socials .= $this->generateMemberSocialIcon($member->bluesky, "Bluesky", "fa-brands fa-bluesky");
		};
		if (isset($member->twitter)) {
			$socials .= $this->generateMemberSocialIcon($member->twitter, "Twitter", "fa-brands fa-twitter");
		};
		if (isset($member->twitch)) {
			$socials .= $this->generateMemberSocialIcon($member->twitch, "Twitch", "fa-brands fa-twitch");
		};
		if (isset($member->facebook)) {
			$socials .= $this->generateMemberSocialIcon($member->facebook, "Facebook", "fa-brands fa-facebook");
		};
		if (isset($member->tumblr)) {
			$socials .= $this->generateMemberSocialIcon($member->tumblr, "Tumblr", "fa-brands fa-tumblr");
		};

		return $socials;
	}
	
}
