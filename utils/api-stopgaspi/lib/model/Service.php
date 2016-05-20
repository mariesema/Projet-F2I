<?php

namespace lib\model;

abstract class Service
{
    protected $model;
    public    $data = null;

    /**
     * Return a JSON Response
     * @param  array   $resultat    
     * @param  boolean $error       
     * @param  string  $errorMessage
     * @return object               
     */
    protected function resultApi($resultat, $error = false, $errorMessage = null)
    {
        $result = new \stdClass();
        $result->response        = $resultat;
        $result->apiError        = $error;
        $result->apiErrorMessage = $errorMessage;

        return $result;
    }

    /**
     * Fetch all results
     * @return JSONObject
     */
    public function get_all()
    {
        $this->data = $this->model->findAll();
        return $this->resultApi($this->data);
    }

    /**
     * Get resource from id
     * @return JSONObject
     */
    public function get_from_primary($value = null)
    {
        if (is_null($value)) {
            return $this->resultApi(null, true, 'Primary requested is null !');
        }

        // @todo get element from primary
        $this->data = $this->model->findByPrimary($value);
        if (!$this->data) {
            return $this->resultApi(null);
        }

        return $this->resultApi($this->data);
    }

    /**
     * Remove resource from id
     * @return JSONObject
     */
    public function delete_from_primary($value = null)
    {
        if (is_null($value)) {
            return $this->resultApi(null, true, 'Primary requested is null !');
        }

        return $this->resultApi($this->model->removeByPrimary($value));
    }

    /**
     * Get all data from table
     * @return JSONObject
     */
    public function get_data()
    {
        $data = $this->model->findAll();
        if (!$data) {
            return $this->resultApi(array());
        }

        $this->data = $data;
        return $this->resultApi($this->data);
    }

    /**
     * Delete all data
     * @return JSONObject
     */
    public function delete_data()
    {
        return $this->resultApi($this->model->removeAll());
    }
}