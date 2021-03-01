<?php

declare(strict_types=1);

namespace App\Serializer\Normalizer;

use App\Model\Response\Api\ResponseApi;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class ResponseApiNormalizer extends AbstractNormalizer implements NormalizerInterface
{
    /**
     * {@inheritdoc}
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        /** @var ResponseApi $object */
        $data = [];
        $data['status_code'] = $object->getStatus();
        $data['message'] = $object->getMessage();
        if (null !== $object->getData()) {
            $data['data'] = $this->serialize($object->getData());
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof ResponseApi;
    }
}
