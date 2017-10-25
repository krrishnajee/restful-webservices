<?php
/**
 * @file
 * Contains Drupal\custom_rest\Plugin\rest\resource\custom_rest.
 */
namespace Drupal\custom\Plugin\rest\resource;
//namespace Drupal\country\Plugin\rest\resource;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\rest\Plugin\rest\resource\EntityResourceValidationTrait;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Entity\EntityStorageException;
use Drupal\rest\Plugin\ResourceBase;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\rest\ModifiedResourceResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Drupal\node\Entity\Node;
use Drupal\Core\Controller\ControllerBase;
use Drupal\rest;

/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "custom_rest_resource",
 *   label = @Translation("Country rest resource"),
 *   uri_paths = {
 *     "canonical" = "/api/your_endpoint",
 *     "https://www.drupal.org/link-relations/create" = "/api/your_endpoint"
 *   }
 * )
 */
class CustomRestResource extends ResourceBase {

    use EntityResourceValidationTrait;
  
    /**
     * A current user instance.
     *
     * @var \Drupal\Core\Session\AccountProxyInterface
     */
    protected $currentUser;
  
    /**
     * A current entity type manager interface
     *
     * @var EntityTypeManagerInterface
     */
    protected $entityTypeManager;
  
    /**
     * Constructs a new CustomRestResource object.
     *
     * @param array $configuration
     *   A configuration array containing information about the plugin instance.
     * @param string $plugin_id
     *   The plugin_id for the plugin instance.
     * @param mixed $plugin_definition
     *   The plugin implementation definition.
     * @param array $serializer_formats
     *   The available serialization formats.
     * @param \Psr\Log\LoggerInterface $logger
     *   A logger instance.
     * @param \Drupal\Core\Session\AccountProxyInterface $current_user
     *   A current user instance.
     * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
     *   A current entity type manager interface
     */
    public function __construct(
      array $configuration,
      $plugin_id,
      $plugin_definition,
      array $serializer_formats,
      LoggerInterface $logger,
      AccountProxyInterface $current_user,
      EntityTypeManagerInterface $entity_type_manager) {
      parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
  
      $this->currentUser = $current_user;
      $this->entityTypeManager = $entity_type_manager;
    }
  
    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
      return new static(
        $configuration,
        $plugin_id,
        $plugin_definition,
        $container->getParameter('serializer.formats'),
        $container->get('logger.factory')->get('custom'),
        $container->get('current_user'),
        $container->get('entity_type.manager')
      );
    }
  
    /**
     * Responds to POST requests.
     *
     * Returns a list of bundles for specified entity.
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     *   Throws exception expected.
     *
     * @param array $data
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Drupal\rest\ModifiedResourceResponse
     */
    public function post(array $data, Request $request) {
  
      // You must to implement the logic of your REST Resource here.
      // Use current user after pass authentication to validate access.
      //if (!$this->currentUser->hasPermission('access content')) {
      //  throw new AccessDeniedHttpException();
      //}
  
      $response = array();
      $headers = array();
  
      $postData = json_encode($data);
      //if post data null return error
      if($postData == null){
          $response["ErrorCode"] = 'A00';
          $response["Message"] = "No data found";
          return new ModifiedResourceResponse($response, 422, $headers);
      }
  
      //decode json data and get the values
      $jsonData = json_decode($postData, TRUE);
		
      //Do the logic
  
      if('bingo'){
            
            $response["status_code"] = 200;
            $response["Message"] = "success";
            
      }
  
      return new ModifiedResourceResponse($response, 200, $headers);
  
    }
}
