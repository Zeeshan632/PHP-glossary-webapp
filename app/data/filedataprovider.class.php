<?php

// require("glossaryterm.class.php");

class FileDataProvider extends DataProvider
{

    public function get_terms()
    {
        $json = $this->get_data();
        return json_decode($json);
    }

    public function get_term($term)
    {
        $terms = $this->get_terms();
        foreach ($terms as $item) {
            if ($item->term === $term) {
                return $item;
            }
        }
        return false;
    }

    public function search_terms($search)
    {
        $items = $this->get_terms();

        $results = array_filter($items, function ($item) use ($search) {
            if (
                strpos(strtoupper($item->term), strtoupper($search)) !== false ||
                strpos(strtoupper($item->definition), strtoupper($search))
            ) {
                return $item;
            }
        });
        return $results;
    }

    public function add_term($term, $definition)
    {
        $items = $this->get_terms();

        require_once('glossaryterm.class.php');
        $items[] = new GlossaryTerm($term, $definition);

        $this->set_data($items);
        return true;
    }

    public function update_term($original_term, $new_term, $definition)
    {
        $terms = $this->get_terms();

        foreach ($terms as $item) {
            if ($item->term === $original_term) {
                $item->term = $new_term;
                $item->definition = $definition;
                break;
            }
        }
        $this->set_data($terms);
    }

    public function delete_term($term)
    {
        $terms = $this->get_terms();

        for ($i = 0; $i < count($terms); $i++) {
            if ($terms[$i]->term === $term) {
                unset($terms[$i]);
                break;
            }
        }
        $new_terms = array_values($terms);
        $this->set_data($new_terms);
    }

    private function get_data()
    {
        $fname = $this->source;
        $json = '';

        if (!file_exists($fname)) {
            file_put_contents($fname, '');
        } else {
            $json = file_get_contents($fname);
        }

        return $json;
    }

    private function set_data($arr)
    {
        $fname = $this->source;
        $json = json_encode($arr);

        file_put_contents($fname, $json);
    }
}
