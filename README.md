# Restful Webservices Drupal 8

Create custom rest resource endpoint to POST data into system.

### Endpoint : "/api/your_endpoint"

```
/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "custom_rest_resource",
 *   label = @Translation("Custom rest resource"),
 *   uri_paths = {
 *     "canonical" = "/api/your_endpoint",
 *     "https://www.drupal.org/link-relations/create" = "/api/your_endpoint"
 *   }
 * )
 */
```