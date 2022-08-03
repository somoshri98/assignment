<?php

namespace Drupal\dynamic_date_time;

use Drupal\Core\Config\ConfigFactory;
use Drupal\Component\Datetime\TimeInterface;
use Drupal\Core\Datetime\DateFormatter;

/**
 * Fetches time and Date based on Timezone.
 */
class DateTimeService {
  /**
   * The time service.
   *
   * @var \Drupal\Component\Datetime\TimeInterface
   */
  protected $timestamp;
  /**
   * The date formatter service.
   *
   * @var \Drupal\Core\Datetime\DateFormatter
   */
  protected $timeformater;
  /**
   * The config factory service.
   *
   * @var \Drupal\Core\Config\ConfigFactory
   */
  protected $config;

  /**
   * Custom Redirect constructor.
   */
  public function __construct(TimeInterface $timestamp, DateFormatter $timeformater, ConfigFactory $config) {
    $this->timestamp = $timestamp;
    $this->timeformater = $timeformater;
    $this->config = $config;
  }

  /**
   * Custom Redirect constructor.
   */
  public function getDateTime() {
    $config = $this->config->getEditable('location.admin_settings');
    $timezone = $config->get('timezone');
    $currenttimestamp = $this->timestamp->getRequestTime();
    $time = $this->timeformater->format($currenttimestamp, $type = 'custom', $format = 'dS M Y - h : i a', $timezone);
    return $time;
  }

}


