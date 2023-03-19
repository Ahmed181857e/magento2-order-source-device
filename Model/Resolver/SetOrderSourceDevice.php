<?php

namespace Ahmed\order\Model\Resolver;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Sales\Model\OrderRepository;

class SetOrderSourceDevice implements ResolverInterface
{
    /**
     * @var OrderRepository
     */
    protected $orderRepository;

    public function __construct(
        OrderRepository $orderRepository
    ) {
        $this->orderRepository = $orderRepository;
    }

    public function resolve(
        \Magento\Framework\GraphQl\Config\Element\Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {

        $orderSourceDevice = (string) ($args['order_source_device'] ?? '');

        if (empty($args['order_id'])) {
            throw new GraphQlInputException(__('Please specify a valid order ID.'));
        }

        try {
            $order = $this->orderRepository->get($args['order_id']);
            $order->setData('order_source_device', $orderSourceDevice);
            $this->orderRepository->save($order);
        } catch (LocalizedException $e) {
            throw new GraphQlInputException(__($e->getMessage()));
        }

        return ['success' => true];
    }
}
