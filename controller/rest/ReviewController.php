<?php

class ReviewController extends RestController {

    public function setData() :Response {
        $reviewData = $this->request->getInputParams();

        $review = new Review($reviewData['id'] ?? null);
        $review->import((object)$reviewData);
        $reviewId = $review->save();
        if ($reviewId === false) {
            return $this->returnErrorMessage('Impossibile salvare la recensione.');
        }
        return $this->returnResult(['id' => $reviewId]);
    }

    public function delete() :Response {
        $id = $this->request->getQueryParam('id');
        if (is_null($id)) {
            return $this->returnErrorMessage('Riferimento recensione non valido', 400);
        }
        $review = new Review($id);
        if (!$review->exists()) {
            return $this->returnErrorMessage('Recensione non trovata', 404);
        }
        $result = $review->delete();
        if ($result) {
            return $this->returnResult(null);
        } else {
            return $this->returnErrorMessage('Impossibile eliminare la recensione.');
        }
    }

}