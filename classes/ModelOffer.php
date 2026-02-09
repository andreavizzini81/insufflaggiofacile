<?php

class ModelOffer extends BaseComponent {

    public  int           $modelId;
    public  string        $modelDescription;
    public  string        $familyName;
    private ?int          $coverImageId;
    public  int           $makeId;
    public  string        $makeDescription;
    public  int           $offerId;
    public  float         $monthlyFee;
    public  int           $kmPerYear;
    public  int           $installments;
    public  float         $deposit;
    public  string        $infocar;
    public  ?VariantImage $coverImage;
    public  bool          $inStock;
    public  bool          $onSale;
    public  int           $variants;

    public function __construct(int $modelId, int $offerId) {
        parent::__construct();
        $this->modelId = $modelId;
        $this->offerId = $offerId;
        $this->getData();
    }

    private function getData() {
        $data = $this->db->getRow(
            sprintf(
                'SELECT
                    model.id AS modelId,
                    model.description AS modelDescription,
                    model.family_name AS familyName,
                    model.variant_image_id AS coverImageId,
                    make.id AS makeId,
                    make.description AS makeDescription,
                    offer.monthly_fee AS monthlyFee,
                    offer.km_per_year AS kmPerYear,
                    offer.installments AS installments,
                    offer.deposit AS deposit,
                    vehicle.infocar AS infocar,
                    (SELECT COUNT(*) FROM vehicle WHERE model_id = model.id AND active = 1 AND in_stock = 1) AS in_stock_count,
                    (SELECT COUNT(*) FROM vehicle WHERE model_id = model.id AND active = 1 AND on_sale = 1) AS on_sale_count,
                    (SELECT COUNT(*) FROM vehicle WHERE model_id = model.id AND active = 1) AS variants
                FROM
                    model
                    INNER JOIN make ON model.make_id = make.id
                    INNER JOIN vehicle ON vehicle.model_id = model.id
                    INNER JOIN offer ON offer.vehicle_id = vehicle.id
                WHERE
                    model.id = %d AND
                    offer.id = %d',
                $this->modelId, 
                $this->offerId
            )
        );
        if (!$data) {
            return false;
        }
        foreach($data as $prop => $value) {
            if (property_exists($this, $prop)) {
                $this->{$prop} = $value;
            }
        }
        $this->coverImage = $this->getCoverImage();
        $this->inStock = $data->in_stock_count > 0;
        $this->onSale = $data->on_sale_count > 0;
        return true;
    }

    public function getCoverImage(): ?VariantImage {
        if ($this->coverImageId) {
            return new VariantImage($this->coverImageId);
        } else {
            $variantImageId = $this->db->getVar(
                sprintf(
                    'SELECT id FROM variant_image WHERE model_id = %d ORDER BY sort ASC', $this->modelId
                )
            );
            if (!$variantImageId) {
                return null;
            }
            return new VariantImage($variantImageId);
        }
    }

}