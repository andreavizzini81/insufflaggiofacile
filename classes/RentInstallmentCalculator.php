<?php

class RentInstallmentCalculator {

    public const DECAY_RATE_VALUES = [
        12 => 25,
        24 => 40,
        36 => 50,
        48 => 57.5,
        60 => 65,
        72 => 72.5,
        84 => 80,
        96 => 87.5
    ];

    private int   $duration = 36;
    private int   $deposit = 10;
    private int   $commission = 5;
    private int   $discount = 15;
    private int   $interestRate = 8;
    private int   $servicesIncidence = 40;
    private int   $vatValue = 22;

    private float $vehiclePrice;

    public function __construct(float $vehiclePrice) {

        if ($vehiclePrice <= 0) {
            throw new Exception('Invalid vehicle price');
        }

        $this->vehiclePrice = $vehiclePrice;

    }

    public function getDuration(): int {
        return $this->duration;
    }

    public function setDuration(int $duration): self {
        $this->duration = $duration;
        return $this;
    }

    public function getDeposit(): int {
        return $this->deposit;
    }

    public function setDeposit(int $deposit): self {
        $this->deposit = $deposit;
        return $this;
    }

    public function getCommission(): int {
        return $this->commission;
    }

    public function setCommission(int $commission): self {
        $this->commission = $commission;
        return $this;
    }

    public function getDiscount(): int {
        return $this->discount;
    }

    public function setDiscount(int $discount): self {
        $this->discount = $discount;
        return $this;
    }

    public function getInterestRate(): int {
        return $this->interestRate;
    }

    public function setInterestRate(int $interestRate): self {
        $this->interestRate = $interestRate;
        return $this;
    }

    public function getServicesIncidence(): int {
        return $this->servicesIncidence;
    }

    public function setServicesIncidence(int $servicesIncidence): self {
        $this->servicesIncidence = $servicesIncidence;
        return $this;
    }

    public function getVatValue(): int {
        return $this->vatValue;
    }

    public function setVatValue(int $vatValue): self {
        $this->vatValue = $vatValue;
        return $this;
    }

    private function getNetVehiclePrice(int $roundPrecision = 3): float {
        return round(
        	$this->vehiclePrice / (1 + ($this->vatValue / 100)), $roundPrecision
        );
    }

    private static function getInterpolatedDecayRateByDuration(int $duration): float {
	
        $lowerBound = null;
        $upperBound = null;
        
        foreach(RentInstallmentCalculator::DECAY_RATE_VALUES as $step => $value) {
            if ($step == $duration) {
                return $value;
            }
            if ($duration > $step) {
                $lowerBound = $value;
            }
            if ($duration < $step && is_null($upperBound)) {
                $upperBound = $value;
            }
        }
        
        if (is_null($lowerBound)) {
            return $upperBound;
        }
        if (is_null($upperBound)) {
            return $lowerBound;
        }
        
        return round(($upperBound + $lowerBound) / 2, 1);

    }

    private static function getResidualValue(float $value, int $duration): float {

        $decayRate = RentInstallmentCalculator::getInterpolatedDecayRateByDuration($duration);

        return round(
            $value * $decayRate / 100, 2
        );

    }

    public function getValues(): object {

        $netVehiclePrice = $this->getNetVehiclePrice();
        $discountedVehiclePrice = round(
        	$netVehiclePrice * ((100 - $this->discount) / 100), 3
        );
        $rentInterests = $discountedVehiclePrice * $this->interestRate / 100;
		$residualValueAfterRent = self::getResidualValue($netVehiclePrice, $this->duration);
        
        $vehicleRentInstallment = round(
        	($discountedVehiclePrice + $rentInterests - $residualValueAfterRent) / $this->duration, 3
        );

        if ($vehicleRentInstallment < 0) {
            $vehicleRentInstallment = 0;
        }
        
        $servicesInstallment = round(
        	$vehicleRentInstallment * $this->servicesIncidence / 100, 4
        );
        
        $depositValue = $discountedVehiclePrice * $this->deposit / 100;
        $depositInstallment = round($depositValue / $this->duration, 3);
        
        $rentInstallment = $vehicleRentInstallment + $servicesInstallment - $depositInstallment;
        
        $commissionsValue = $discountedVehiclePrice * $this->commission / 100;
        $commissionsInstallment = round($commissionsValue / $this->duration, 3);
        
        $rentInstallmentAfterCommissions = $rentInstallment + $commissionsInstallment;
        
		return (object)[
			'netVehiclePrice' => $netVehiclePrice,
            'duration' => $this->duration,
            'rentInterests' => $rentInterests,
            'discountedVehiclePrice' => $discountedVehiclePrice,
            'residualValueAfterRent' => $residualValueAfterRent,
            'vehicleRentInstallment' => $vehicleRentInstallment,
            'servicesInstallment' => $servicesInstallment,
            'depositValue' => $depositValue,
            'depositInstallment' => $depositInstallment,
            'rentInstallment' => $rentInstallment,
            'commissionsValue' => $commissionsValue,
            'rentInstallmentAfterCommissions' => $rentInstallmentAfterCommissions
		];
    }

    public function getValue(string $key): mixed {
        $data = $this->getValues();
        return property_exists($data, $key) ? $data->{$key} : null;
    }

}